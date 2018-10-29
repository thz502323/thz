<?php
/**
 * @Author: Marte
 * @Date:   2018-02-10 14:19:52
 * @Last Modified by:   Marte
 * @Last Modified time: 2018-02-10 15:07:36
 */
//在php里面生成jspn信息 json_encode(数组/对象)
//索引数组
$color=array('red','blue','green');
echo json_encode($color);

//关联数组
$citys = array('heibei' => 'sjz','shandong'=>'jn' );
echo json_encode($citys);

// 索引关联数组
$city = array('heibei' => 'sjz' ,'shanghai' );
echo json_encode($city);

//对象生成json信息
class Person{
    public $name='tom';
    public $age='22';
    public function run(){
        echo 'is runing';
    }
}

$p= new Person();
echo json_encode($p);
