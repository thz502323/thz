<?php

namespace Admin\Controller;
// use Think\Controller;

class IndexController extends CommonController{


    public function index(){
      $this->display();
    }

    public function home(){
        //展示模板
        $this->display();
    }
    public function _empty(){
        echo "<h2 style='text-align:center'>你好，你访问的页面不存在，请检查输入的网址！</h2>";
    $this->display('Empty/error');
    }
}