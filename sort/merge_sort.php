<?php

/**
 * @Author: thz
 * @Date:   2018-03-11 18:17:31
 * @Last Modified by:   伪中二
 * @Last Modified time: 2018-03-21 15:08:41
 */

/**
 * [merge_sort description]
 * @param  [type] $a [description]
 * @param  [type] $b [description]
 * @return [type]    [description]
 */
function merge_sort($a, $b)
{
    $a_i = $b_i = 0;
    $count_a = count($a);
    $count_b = count($b);
    $ret = [];
    while ($a_i < $count_a && $b_i < $count_b) {
        if ($a[$a_i] > $b[$b_i]) {
            array_push($ret, $b[$b_i]);
            $b_i++;
        } else {
            array_push($ret, $a[$a_i]);
            $a_i++;
        }
    }
    if ($a_i < $count_a) {
        $ret = array_merge($ret, array_slice($a, $a_i));
    }
    if ($b_i < $count_b) {
        $ret = array_merge($ret, array_slice($b, $b_i));
    }
    return $ret;
}

//$a = [3,1];
//$b = [2,4];
//$ret = merge_sort($a,$b);
//echo implode(',', $ret);



$arr = [4,5,6,3,1,2];
function select_sort(array $arr)
{
    $count = count($arr);
    if($arr < 2) return $arr;
    for($i = 0; $i < $count; $i++){
        $min = $arr[$i];
        $min_i = $i;
        for ($j = $i; $j < $count; $j++){
            if ($arr[$j] < $min){
                $min = $arr[$j];
                $min_i = $j;
            }
        }
        $arr[$min_i] = $arr[$i];
        $arr[$i] = $min;

    }
    return $arr;
}
//$ret = select_sort($arr);
//echo implode(',',$ret);


$arr = [1,5,6,2,4,3];
function insert_sort($arr)
{
    $count = count($arr);
    if ($count < 2) return $arr;
    for ($i = 0; $i < $count; $i++){
        for ( $j = $i;$j >0;$j--){
            if ($arr[$j] < $arr[$j - 1]) {
                $tmp = $arr[$j - 1];
                $arr[$j - 1] = $arr[$j];
                $arr[$j] = $tmp;
            }
        }
    }
    return $arr;
}
/*$ret = insert_sort($arr);
echo implode(',',$ret);*/

$arr = [1,5,3,6,2,4];
 function mp_sort($arr)
{
  $count = count($arr);
  if($count < 2) return $arr;
  for($i = 0; $i<$count; $i++){
    for ($j=0; $j <$count-$i-1 ; $j++) {
        if ($arr[$j] > $arr[$j + 1]) {
            $tmp = $arr[$j + 1];
            $arr[$j + 1] = $arr[$j];
            $arr[$j] = $tmp;
        }
    }
  }
  return $arr;
}

$ret = mp_sort($arr);
echo implode(',',$ret);



function quick_sort($arr) {
    //先判断是否需要继续进行
    $length = count($arr);
    if($length <= 1) {
        return $arr;
    }
    //如果没有返回，说明数组内的元素个数 多余1个，需要排序
    //选择一个标尺
    //选择第一个元素
    $base_num = $arr[0];
    //遍历 除了标尺外的所有元素，按照大小关系放入两个数组内
    //初始化两个数组
    $left_array = array();//小于标尺的
    $right_array = array();//大于标尺的
    for($i=1; $i<$length; $i++) {
        if($base_num > $arr[$i]) {
            //放入左边数组
            $left_array[] = $arr[$i];
        } else {
            //放入右边
            $right_array[] = $arr[$i];
        }
    }
    //再分别对 左边 和 右边的数组进行相同的排序处理方式
    //递归调用这个函数,并记录结果
    $left_array = quick_sort($left_array);
    $right_array = quick_sort($right_array);
    //合并左边 标尺 右边
    return array_merge($left_array, array($base_num), $right_array);
}

