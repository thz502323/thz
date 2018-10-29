<?php
/**
 * @Author: Marte
 * @Date:   2018-01-18 15:39:03
 * @Last Modified by:   Marte
 * @Last Modified time: 2018-01-18 16:21:26
 */
function getTree($list,$pid=0,$level=0){
    static $tree=array();
    foreach ($list as $row) {
        if($row['pid']==$pid){
            $row['level']=$level;
            $tree[]=$row;
            getTree($list,$row['id'],$level+1);
        }
    }
    return $tree;
}