<?php
 $conn=mysqli_connect("localhost","root","502323947");
 if($conn){
  echo "连接mysql数据库ok";
 }else {
  echo "连接mysql数据库失败";
 }