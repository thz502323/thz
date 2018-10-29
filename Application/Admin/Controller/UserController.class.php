<?php
namespace Admin\Controller;
// use Think\Controller;

class UserController extends CommonController
{

    public function add(){
    if(IS_POST){
        $model=M('User');
        $data=$model->create();
        //添加时间字段
        $data['addtime']=time();
        // dump($data);die;
        //保存到数据表
        $result=$model->add($data);
        // dump($data);die;
        if($result){
            $this->success('添加成功',U('showList'),3);
        }else{
            $this->error('添加失败');
        }

    } else{
        $data=M('Dept')->field('id,name')->select();

        $this-> assign('data',$data);

        $this->display();
        }

    }

    public function showList(){
        $model=M('User');

        $count = $model-> count();//查询总的记录数

        $n=3;
        $page=new \Think\Page($count,$n);//每页显示3个
        //使用show()方法生成url
        $show=$page->show();
        //使用limit方法查询
        $data=$model->limit($page->firstRow,$page->listRows)->select();

        $this->assign('data',$data);
        $this->assign('show',$show);
        $this->assign('count',$count);
        $this->assign('n',$n);

        $this->display();
    }
    public function charts(){
    //查询部门里面的人数并分组select t2.name as deptname,count(*) as count from sp_user as t1,sp_dept as t2 where t1.dept_id=t2.id group by deptname;
        $mod=M();
        $data=$mod->field('t2.name as deptname,count(*) as count')
                  ->table('sp_user as t1,sp_dept as t2')
                  ->where('t1.dept_id=t2.id')
                  ->group('deptname')
                  ->select();
        //php版本>5.6，可以直接将data二维数组assign，不需要任何处理
        //dump($data);die;
        // $this->assign('data',$data);

        //php<5.6
        $str='[';
        foreach ($data as $key => $value) {
            $str.="['".$value['deptname']."',".$value['count']."],";
        }
        //去除最后的逗号
        $str=rtrim($str,',').']';
        $this->assign('str',$str);


        $this->display();
    }

}
