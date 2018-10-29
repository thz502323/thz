<?php
namespace Admin\Controller;
//use Think\Controller;


class EmailController extends CommonController{

    public function send(){//发送邮件方法
        if (IS_POST) {
            $post = I('post.');
            $model = D('Email');
            $result = $model -> addData($post,$_FILES['file']);
            if($result){
                $this->success('邮件发送成功！',U('sendBox'),3);
            }
            else{
                $this->error('发送失败！');
            }
        }
        else{
        $data = M('User') -> field('id,truename') ->where("id!=" . session('id'))->select();
        $this ->assign('data',$data);
        $this->display();
        }
    }

    public function sendBox(){//收件箱方法
        //需要连表查询id到名字  主表 sp_mail 从表sp_user
        //原生sql语句：select t1.*,t2.truename as truename from sp_email as t1 left join sp_user as t2 on t1.to_id=t2.id where t1.from_id= 当前id
        $data =M('Email')->field('t1.*,t2.truename as truename')
                         ->alias('t1')
                         ->join('left join sp_user as t2 on t1.to_id = t2.id')
                         ->where('t1.from_id = ' .session('id'))
                         ->select();
                         $this->assign('data',$data);
                         $this->display();
    }

    /*空操作方法：如点开不存在的方法，或者输入不错存在的网站
    public function _empty(){
    echo '你好，你访问的' . ACTION_NAME .'不存在！';//如果当前控制器点开不存在方法就会默认访问这个方法

    }*/
    public function recBox(){
        //原生sql:select t1.*,t2.truename as truename from sp_email as t1 left join sp_user as t2 on t1.from_id = t2.id where t1.to_id= 当前用户id;
        $data=M('Email')->field('t1.*,t2.truename as truename')->alias('t1')->join('left join sp_user as t2 on t1.from_id = t2.id')->where('t1.to_id=' .session('id'))->select();
        $this->assign('data',$data);
        $this->display();

    }

    public function downLoad(){
        $id=I('get.id');
        $data=M('Email')->find($id);
        $file =WORKING_PATH . $data['file'];
        header("Content-type: application/octet-stream");
        header('Content-Disposition:attachment; filename="' . basename($file) . '"');
        header("Content-Length:".filesize($file));
        readfile($file);
    }

    public function getContent(){
        $id=I('get.id');
        $mod=M('Doc');
        $data=$mod->where("id= $id and to_id=" .session('id'))->find($id);
        // 修改未读成已读
        if($data['isread']==0){
        M('Email')->save(array('id' => $id,'isread'=>1 ));
        }
        //输出内容，并且还原成被转义的字符
        echo htmlspecialchars_decode($data['content']);
    }

    public function getCount()
    {//实例化模型
        if(IS_AJAX){
            $mod=M('Email');
            $mod->where("isread = 0 and to_id =".session('id')) -> count();//记录并返回未读邮件总和
        }
    }

}
