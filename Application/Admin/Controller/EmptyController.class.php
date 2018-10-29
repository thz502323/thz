<?php
namespace Admin\Controller;
use Think\Controller;

class EmptyController extends Controller{
     public function _empty(){
     $this->display('Empty/error');//空控制器操作，默认访问这个控制器

    }
}