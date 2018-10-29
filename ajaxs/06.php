<?php
/**
 * @Author: Marte
 * @Date:   2018-02-09 17:33:40
 * @Last Modified by:   Marte
 * @Last Modified time: 2018-02-09 17:56:33
 */
// 头文件防止PHP缓存
header("Cache-Control:no-cache");
header("Pragma:no-cache");
header("Expires:-1");


$fp=fopen("./6.txt","a");//（a以附加的方式打开。若文件不存在，则会建立该文件，如果文件存在，写入的数据会被加到文件尾，即文件原先的内容会被保留）
fwrite($fp, "java\n");
fclose($fp);