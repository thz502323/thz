<?php
namespace Admin\Controller;
//use Think\Controller;


class DocController extends CommonController{
    public function add(){
    if(IS_POST){
        //接收数据
        $post=I('post.');
        //补全addtime字段
        $mod=D('Doc');
        $result=$mod->saveData($post,$_FILES['file']);
        if($result){
            $this->success('添加成功',U('showlist'),3);
        }else{
            $this->error('添加失败');
        }
    }else{
    $this->display();
    }
  }


    public function showList(){
        $model=M('Doc');
        $data=$model->select();//查询全部
        //传递给showList
        $this->assign('data',$data);
        $this->display();
    }


    public function download(){
        $id=I('get.id');
        $data=M('Doc')->find($id);
        //下载使用的代码
        $file=WORKING_PATH . $data['filepath'];
        header("Content-type: application/octet-stream");
        header('Content-Disposition:attachment; filename="' . basename($file) . '"');
        header("Content-Length:".filesize($file));
        readfile($file);
    }

    public function showContent(){
        //接收id
        $id=I('get.id');
        $mod=M('Doc');
        $data=$mod->find($id);
        //输出内容，并且还原成被转义的字符
        echo htmlspecialchars_decode($data['content']);
    }

    public function edit(){
        if (IS_POST) {
            $post=I('post.');
            $model=D('Doc');
            $result=$model->updataData($post,$_FILES['file']);
            if($result){
                $this->success('修改成功！',U('showList'),3);
            }else{
                $this->error('修改失败！');
            }
        }
        else{
        $id=I('get.id');
        $data = M('Doc')->find($id);
        $this->assign('data',$data);
        $this->display();
        }
    }

}