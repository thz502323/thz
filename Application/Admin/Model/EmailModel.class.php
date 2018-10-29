<?php
namespace Admin\Model;
use Think\Model;
/**
*
*/
class EmailModel extends Model{
    public function addData($post,$file){
        if($file['error']=='0'){
            $cfg = array('rootPath' => WORKING_PATH . UPLOAD_ROOT_PATH );
             $upload=new \Think\Upload($cfg);
          //上传尽量使用绝对路径
          $info=$upload->uploadOne($file);
          if($info){
            $post['file']=UPLOAD_ROOT_PATH.$info['savepath'].$info['savename'];
            $post['filename']=$info['name'];//文件原始名
            $post['hasfile']='1';
          }
          //补充from_id和addtime字段
          $post['from_id']=session('id');
          $post['addtime']=time();

          return $this->add($post);
        }

    }

}