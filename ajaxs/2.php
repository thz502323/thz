<?php
/**
 * @Author: Marte
 * @Date:   2018-02-10 15:41:27
 * @Last Modified by:   伪中二
 * @Last Modified time: 2018-03-03 14:13:11
 */
//解析、反编码json信息

$city = array('hebei' => 'sjz','shandong'=>'jn','henan'=>'zz');
$jn_city = json_encode($city);

//反编码
$fan_city = json_decode($jn_city);//默认为flase
var_dump($fan_city);

//反编码
$fan_city1 = json_decode($jn_city,true);
var_dump($fan_city1);

//给自定义的json字符串反编码 对单双引号有要求
$jn_str = '{"name":"tom","age":"5"}';
$fan_str = json_decode($jn_str,true);
var_dump($fan_str);
