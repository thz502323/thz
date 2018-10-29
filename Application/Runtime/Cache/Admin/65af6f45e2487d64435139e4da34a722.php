<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Document</title>
</head>
<body>

<!-- $this->display();展示当前控制器与当前方法名称一致的模板文件 -->
<!-- $this->display('模板文件名[不带后缀]');展示当前控制器指定的模板文件 -->
<!-- $this->display('View下目录名/文件名[不带后缀]');展示指定控制器下指定的模板文件 -->
    <p>好好好,zzz</p>
    现在是武汉时间：<?php echo ($var1); ?>

     /Public/Admin
     /Public


</body>
</html>
<!--
 echo /index.php/Admin 从域名开始一直到分组结束的路由
/index.php/Admin/Test 从域名后面开始一直到控制器结束的路由
/index.php/Admin/Test/test1 从域名后面到方法结束的路由
/Public 站点根目录public目录的路由
/index.php/Admin/Test/test1 从域名后面到路由最后（无参数时，/index.php/Admin/Test/test1  /index.php/Admin/Test/test1 表达内容一致）
 -->