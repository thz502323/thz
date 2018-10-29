<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Verify;
/**

*/
class TestController extends Controller
{

    function test()
    {
        //$this->display();
    }

    public function test1()
    {
        //定义变量
        $var=date('Y-m-d h:i:s',time());
        $this->assign('var1',$var);
        $this->display();
    }

    public function test2()
    {
        echo U('1',array('id' =>100)).'<br>';
        echo '<br>';

    }

    public function test3()
    {
        $this->success('操作成功',U('test6'),5);
    }

    public function test4(){
         $array = array('一','二','三','四');
         $this->assign('array',$array);

         $array1 = array(
            array('1.1','1.2','1.3','1.4'),
            array('2.1','2.2','2.3','2.4')
          );
         $this->assign('array1',$array1);
         $this->display();
        }

    public function test5(){
        $stu=new student();
        $stu->id='1';
        $stu->name='thz';
        $stu->sex='男';
     $this->assign('stu',$stu);
     $this->display();
    }
    /*
    <volist name='需要遍历的模板名' id='当前遍历的元素'>
    循环体
    </volist>
   foreach 是 volist的简化模式
    <foreach  name='需要遍历的模板名' item='当前遍历的元素'>
    循环体
    </foreach>

     */
     public function test6(){
            $array1 = array(
            array('1.1','1.2','1.3','1.4'),
            array('2.1','2.2','2.3','2.4')
          );
         $this->assign('array1',$array1);
         $day=date('N',time());
         $this->assign('day',$day);
         $this->display();
         //if标签：
         //<if condition='条件表达式'>
         //输出结果一
         //<elseif condition='条件表达式'/>注意/
         //输出结果二
         ////<elseif condition='条件表达式'/>注意/
         //输出结果三
         //.....
         //<else/>
         //最后一个输出
         //</if>

     }
     /*
跟踪信息：查询或展示系统的执行情况  开启SHOW_PAGE_TRACE
两种模式：调试模式/开发模式和生产模式 APP_DEBUG 默认开发模式
sql调试：$model->getLastSql(); $model->_sql();获取当前模型的最后一条成功执行的sql语句
性能调试：
G('开始标记');
...
G('结束标志');
G('开始标志'，'结束标志',数字/字符m);
第三个参数m是数字则表示统计执行时间，数字表示小数位，如果是字符m，则表示统计内存开销，单位是byt(需要服务器支持)。
 */
    public function test7(){
            G('start');
            for ($i=1; $i<10000 ; $i++) {
                echo $i;
            }

            G('end');
            echo '<hr>';
            echo G('start','end',5);
    }

    public function test8(){
         //where())查询方法
         $mod=M('Dept');
         $mod->where('id>0 and pid<5');//可以接收字符串=SELECT * FROM `sp_dept` WHERE ( id>0 and pid<5 )
         $data=$mod->select();
         dump($data);
         /*
         where表示查询条件，但是要求条件中的字段必须是数据表中存在的字段；having要求条件中的字段必须是结果集中存在的
          */

    }
    public function test9(){
        // limit方法限制输出的条数（数据分页）
        // $mod->limit(n) n为数字 输出前n行
        // $mod->limit(起始位置，偏移量/长度) 从起始长度到偏移量距离
         $mod=M('Dept');
         $mod->limit(3);
         $data=$mod->select();

        $mod->limit(2,4);
        $data1=$mod->select();
        dump($data1);
    }

    public function test10(){
        //field()方法限制输出的结果集字段。
        //$mod->field('字段1，字段2，字段3[as 别名]'...);参数也是select之后到from之前的那一串字符串、
        $mod=M('Dept');
        $mod->field('id,name,remark');
        $data1=$mod->select();
        dump($data1);

    }

    public function test11(){
        //order()方法 排序(升序asc/降序desc)。
        //$mod->order('字段名 排序规格');
         $mod=M('Dept');
         $mod->order('id desc');
         $data1=$mod->select();

         $mod->order('remark asc');
         $data=$mod->select();
         dump($data);
    }

    //案例：查询部门表，要求查询部门名和出现的次数
    public function test12(){
        //使用group()方法 分组查询
        //$mod->group('字段名');
         $mod=M('Dept');
         $mod->field('name,count(*) as count,id');
         $mod->group('remark');
        $data=$mod->select();
         dump($data);
    }

    public function lg(){
         //连贯方法 $mod->where()->limit()->order().....->field()->select();
         //where()->limit()->order()->field()无需顺序要求只要 模型在前 curd方法在后即可。
         $mod=M('Dept');
         $data=$mod->field('name,count(*),id')->group('remark')->select();
         dump($data);
    }

    public function test13(){
    //    _sql(),getLastSql()一样    fetchSql()也是可以调试sql语句错误 ThinkPHP 3.2.3以后
    // $mod->where()->limit()->order()->.....fetchSql()->field()->select();   无需顺序要求只要 模型在前 curd方法在后 即可将连贯操作的sql语句返回（打印并不执行）

    }

    public function test14(){
        //文件引入
        //C()方法操作ThinkPHP的配置项 C(name ,value); 设置配置name的值 C(name)读取name的值 c();读取全部配置项
        getInfo();
        //load('@/不带后缀的php文件名');文件必须是分组级别的函数库中，并且只能用于定义的分组中。
    }

    public function test15(){
        $ver=new verify();//一个验证码类
        $ver->entry();//生成验证码
    }
    public function test16(){

      echo str_repeat(".",'###');


    }
    public function test17(){
        // $mod=M();执行原生sql语句不需要关联任何表
        //$sql="select t1.*,t2.name as deptname from sp_user as t1,sp_dept as t2 where t1.dept_id=t2.id;";
        //$mod->table('表名1[as别名1],表名2[as 别名2] ');
        //$result=$mod->query($sql);
        $mod=M('Dept');
        $rs=$mod->field('t1.*,t2.name as deptname')->table('sp_user as t1,sp_dept as t2')->where('t1.dept_id=t2.id')->select();
        dump($rs);
    }
    public function test18(){
        /*
        inner join:如果表至少有一个匹配，则返回行，=join
        left join:即使右表每页匹配，也从左表返回所有行
        right join：即使左表每页匹配，也从右表返回所有行
        full join：只要其中有一个表匹配，就返回行
        $mod->join('连表方式 join 表名[as 别名] on 表1.字段=表2.字段')
         */
        $mod=M('Dept');
        //$sql='select t1.*,t2.name as deptname from sp_dept as t1 left join sp_dept as t2 on t1.pid=t2.id;'
        // $model->alias('别名');
        //如果需要给当前表起别名
        $rs = $mod-> field('t1.*,t2.name as deptname') -> alias('t1') -> join('left join sp_dept as t2 on t1.pid=t2.id') ->select();
        dump($rs);

    }

    public function test19(){
        //获取ip
        //get_client_ip(1);
        //实例化对象
         $ip = new \Org\Net\IpLocation('qqwry.dat');
        //查询
         $data = $ip->getlocation('119.75.217.109');//输入要查的ip
         dump($data);
         /*
         接口写法：
         $ip = new \Org\Net\IpLocation('qqwry.dat');
         $ss = I('get.ip');

         $data = $ip->getlocation($ss);//如：在地址栏直接输入http://www.thz.com/index.php/Admin/Test/test19?ip=8.8.8.8
         dump($data);
          */
    }
}
