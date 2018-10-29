<?php
/**
 * @Author: thz
 * @Date:   2018-03-03 12:59:35
 * @Last Modified by:   伪中二
 * @Last Modified time: 2018-03-03 13:21:28
 */
header("content-type:text/html;charset=utf-8");
$url="http://www.weather.com.cn/data/sk/101190408.html";
//file_get_contents();1.打开文件 2.响应其他地址请求
$cont = file_get_contents($url);
echo $cont;
