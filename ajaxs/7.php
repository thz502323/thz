<?php
/**
 * @Author: Marte
 * @Date:   2018-02-12 13:27:22
 * @Last Modified by:   Marte
 * @Last Modified time: 2018-02-12 14:04:14
 */
/*//收集普通表单信息$_POST和上传文件域信息$_FILES
echo "post:";
print_r($_POST);

echo "file:";
print_r($_FILES);*/

//判断附件是否有问题
if($_FILES['file']['error']>0){
    exit('附件异常问题');
}


//附件的存储位置、附件的名字
$path="./upload/";
$name = $_FILES['file']['name'];
$truename = $path.$name;
//把附件从临时路径位置移动到真实文件夹move_uploaded_file()
if(move_uploaded_file($_FILES['file']['tmp_name'],$truename)){
    echo "成功";
}else{
    echo '失败';
}


