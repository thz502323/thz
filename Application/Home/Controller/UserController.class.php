<?php
/*
第一步：申明当前控制器的命名空间
第二步：引入父类控制器（类）
第三步：申明控制器并继承父类控制器
 */
namespace  Home\Controller;
use Think\Controller;

    class UserController extends Controller
{

    function __construct()
    {
       phpinfo();
    }
}