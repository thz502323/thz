<?php
//申明命名空间
namespace Admin\Controller;

//引入父类模型
//use Think\Controller; 由于中间控制器和当前控制器在同一个空间中，所以不需要引入

class DeptController extends CommonController
{
        public function sl(){
            //$mo=new \Admin\Model\DeptModel();
            $mo=D(['DeptModel']);//和上面语句一致
            dump($mo);

        }
/*
D实例化和M实例化方法
D方法：$obj=D(['模型名']);
实例化我们自己创建的模型(分组/Model目录)
M方法实例化:
$obj=M(['不带前缀的表名']);
表达直接实例化父类模型(Think目录下的Model.class.php)
 */

    public function tj(){
        $mod=M('Dept');//直接使用父类模型的增删改查
        //申明数组给add（）方法
        $data=array(
            'name'=>'财务部',
            'pid' =>'0',
            'sort'=>'1',
            'remark'=>'有钱部门come'
            );
        $result=$mod->add($data);//返回的主键id 批量添加addall($二维数组)
        dump($result);
    }

    public function xg()
    {
        $mod=M('Dept');
         $data=array(
            'id'=>'0',
            'name'=>'财务部',
            'pid' =>'0',
            'sort'=>'10',
            'remark'=>'有钱部门come'
            );
        $mod->save($data);

    }

    public function cx()
    {//查询
        $mod=M('Dept');
         /*
         select()查询全部信息
         select(id)查询指定id
         select('id1','id2'...);查询指定id集合等价于mysql中的in语句
         find()查询当前表的第一条记录
         find(id)查询表中指定id记录
         select会返回一个二维数组而find返回一个一维数组
          */
        $b=$mod->select('1');

        $a=$mod->find(1);
        //dump($a);<br>
        dump($b);

    }


    public function sc(){
        $mod=M('Dept');
        /*
        delete()全部删除
        delete(id)删除指定id的记录
        delete(id1,id2...)删除指定多个id的记录
        */
    }


    public function add(){
         if (IS_POST) {
          //处理表单 I()方法可以接收数据，可以接收任何类型输入（post，get，request....）,并且自带sql注入
        // i('变量类型.变量名',['默认值'],['过滤方法'],['额外数据源'])
       //$post=I('post.')
        $mod=D('Dept');
        $data=$mod->create();//创建数据对象，不给对象 则默认是POST里面的$post=I('post.')
        if(!$data){
           $this->error($mod->getError());
           exit;
        }
        $result=$mod->add();
        if($result){
            $this->success('添加成功',U('showList'),3);
        }
        else{
        $this->error('添加失败');
        }
       }
       else{
        $mod=M('Dept');
        $data=$mod->where('pid=0')->select();
        //展示模板
        $this->assign('data',$data);
        $this->display();
       }
    }
      public function showList(){
        $model=M('Dept');

        $data=$model->order('sort asc')->select();
        //二次遍历查询顶级部门
        foreach ($data as $key => $value) {
          //查询pid对应的部门信息
          if($value['pid']>0){
          $info=$model->find($value['pid']);
          $data[$key]['deptname']=$info['name'];
        }
}
        load('@/tree');
        $data=getTree($data);
        $this->assign('data',$data);
        $this->display();
      }

    public function edit(){
      if(IS_POST){
        $post=I('post.');
        $model=M('Dept');
        $result=$model->save($post);
        if($result !== false){
          $this->success('修改成功',U('showList'),3);
        }else{
          $this->error('修改失败');
        }
      }else{
        $id=I('get.id');
        $model=M('Dept');
        $data=$model->find($id);
        $info=$model->where("id !=.$id")->select();
        $this->assign('data',$data);
        $this->assign('info',$info);
        $this->display();
      }
    }

    public function del(){
      $id=I('get.id');
      $mod=M('Dept');
      $result=$mod -> delete($id);
      if($result){
        $this-> success("删除成功！");

      }else{
        $this->error('删除失败！');
      }
    }

}
