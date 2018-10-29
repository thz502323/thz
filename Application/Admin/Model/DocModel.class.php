<?php
namespace Admin\Model;
use Think\Model;


class DocModel extends Model{
//saveData
public function saveData($post,$file){
    //提交处理
    //先判断是否有文件需要处理
        if(!$file['error']){
          //处理上传
          $cfg=array(
            'rootPath'=>WORKING_PATH.UPLOAD_ROOT_PATH
            );
          $upload=new \Think\Upload($cfg);
          //上传尽量使用绝对路径
          $info=$upload->uploadOne($file);
          if($info){
            $post['filepath']=UPLOAD_ROOT_PATH.$info['savepath'].$info['savename'];
            $post['filename']=$info['name'];//文件原始名
            $post['hasfile']=1;
          }

        }
        $post['addtime']=time();
        return $this->add($post);
}
public function updataData($post,$file){
        //如果有文件则处理文件
        if($file['error'] == '0'){//存在文件
          //配置数组
          $cfg= array( 'rootPath'=>WORKING_PATH. UPLOAD_ROOT_PATH);
          //实例化上传类
          $upload= new \Think\Upload($cfg);
          $info=$upload->uploadOne($file);//开始上传
          if($info){
            $post['filepath']= UPLOAD_ROOT_PATH .$info['savepath'] .$info['savename'];
            $post['filename']=$info['name'];
            $post['hasfile']=1;
          }
        }
        //写入文件
        return $this->save($post);

}
}