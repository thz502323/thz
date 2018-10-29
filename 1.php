<?php

/**
 * @Author: thz
 * @Date:   2018-06-02 16:05:59
 * @Last Modified by:   伪中二
 * @Last Modified time: 2018-06-02 17:58:14
 */
 $title = $_POST['title']??'';
 $content = $_POST['content']??'';
 $user_name  = $_POST['user_name']??'';
    $dbname = 'my_db';
    $host='localhost';
    $password = 'THZ502323';
    $username = 'root';
    $created_at = time();
    $conn = new mysqli($host,$username,$password);
    if ($conn->connect_errno) {
        die($conn->connect_errno);
    }
    $conn->select_db($dbname);
     $sql = "insert into message(title,content,created_at,user_name) values('$title','$content','$created_at','$user_name')";
   // $sql = "INSERT INTO `message` (`title`, `content`, `created_at`, `user_name`) VALUES ('5', '1', '1', '2')";
    echo "'$title'",'"$content:';
    $mysql=$conn->query($sql);
    var_dump($mysql);
    if ($mysql) {
        exit('suss');
    }else
    {
        exit('error');
    }
    $mysql->free();
    $mysql->close();

