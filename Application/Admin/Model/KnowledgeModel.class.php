<?php
namespace Admin\Model;

use Think\Model;

class KnowledgeModel extends Model{
    public function addData($post,$file){
        //要求size大于0，或者error=0
        if($file['error'] == '0'){
            $cfg  = array('rootPath'=>WORKING_PATH.UPLOAD_ROOT_PATH);
            $up=new \Think\Upload($cfg);
            $info=$up->UploadOne($file);
            if ($info) {
                $post['picture']=UPLOAD_ROOT_PATH .$info['savepath'] . $info['savename'];
                //制作缩略图
                //1.实例化
                $img= new \Think\Image();
                //2.打开图片，传递图片的路径
                $img->open(WORKING_PATH . $post['picture']);
                //3.制作缩略图，等比缩放
                $img->thumb(100,100);
                //4.保存图片，传递保存完整路径（目录+文件名）
                $img->save(WORKING_PATH . UPLOAD_ROOT_PATH . $info['savepath'].'thumb_' .$info['savename']);
                //补全thumb字段
                $post['thumb']=UPLOAD_ROOT_PATH . $info['savepath'].'thumb_' .$info['savename'];
            }
        }
        $post['addtime']=time();
        return $this->add($post);
    }
}