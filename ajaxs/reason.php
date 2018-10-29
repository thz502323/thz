<?php

/**
 * @Author: thz
 * @Date:   2018-10-01 13:35:13
 * @Last Modified by:   伪中二
 * @Last Modified time: 2018-10-02 23:36:02
 *2018年刑侦科推理试题 --穷举法
 *结果为：B C A C A C D A B A
 */
$ans = array('A','B','C','D');
//无意义问题
     function topic_1($data)
    {
        return true;
    }

// 第五题答案为?
     function topic_2($data)
    {
        $a = array('A' => 'C' ,'B' => 'D' ,'C' => 'A' ,'D' => 'B');
        if ($a[$data[2]] == $data[5]) { //第二题答案ABCD的选项 与 第五题实际答案相同
            return true;
        }
        return false;
    }

//以下哪一题答案与其他三项不同?
     function topic_3($data)
    {
        $a = array('A' =>$data[3] ,'B' => $data[6] , 'C' => $data[2] , 'D' => $data[4] );
        $b = $a[$data[3]]; //$b代表实际上那个题与其他不同
        unset($a[$b]);       //根据关联下标,去掉数组中 实际的那个不同值
        if (!in_array($b,$a)){      //如果$a中不存在相同值,则代表为真答案
            return true;
        }
        return false;
    }

//下列那两题的答案相同?
     function topic_4($data)
    {
        $a = array('A' => $data[1] == $data[5],'B'=> $data[2] == $data[7] ,'C' => $data[1] == $data[9] ,'D' => $data[6] == $data[10]);
        if($a[$data[4]]){
            return true;
        }
        return false;
    }

//下列那道题与本题答案相同
     function topic_5($data)
    {
        $a = array('A' => $data[8],'B' => $data[4],'C' => $data[9],'D' => $data[7]);
        if($a[$data[5]] == $data[5]) return true;
        return false;
    }

//下列那两道题和第八题答案相同?
     function topic_6($data)
    {
        $a = array('A' => $data[8] == $data[2] && $data[2] == $data[4] ,'B' => ($data[8] == $data[1] && $data[1] == $data[6]) ,'C' => ($data[8] == $data[3] && $data[3]== $data[10]),'D' => ($data[8] == $data[5] && $data[5] == $data[9]));
         if($a[$data[6]]){
            return true;
        }
        return false;
    }

// 四个选项中次数最少的是?
     function topic_7($data)
    {
        $a = array('A' => 'C','B' => 'B','C' => 'A','D' => 'D');
        $count = array_count_values($data); //统计各个选项的个数
        arsort($count);
        $b = array_keys($count);
        if ($a[$data[7]] == array_pop($b)) {
            return true;
        }
        return false;
    }

//下面哪一题的答案与第一题的答案字母不相邻
     function topic_8($data)
    {
        $a = array('A' => $data[7] ,'B' => $data[5], 'C' => $data[2],'D' => $data[10] );
        if(abs(ord($a[$data[8]])-ord( $data[1])) > 1){
            return true;
        }
        return false;
    }

//'第一题和第六题答案相同'与'第x题和第五题答案相同'真假相反,X题是哪道?
     function topic_9($data)
    {
        $a = array('A' => $data[6] ,'B' => $data[10], 'C' => $data[2],'D' => $data[9] );
        if (($data[6] == $data[1]) != ($a[$data[9]] == $data[5])) {
            return true;
        }
        return false;
    }

//十道题中ABCD 字母最多出现和最少出现的差为多少?
     function topic_10($data)
    {
        $a = array('A' => 3 ,'B' => 2, 'C' => 4,'D' =>1 );
        $count = array_count_values($data);
        arsort($count);
        $min = array_pop($count);
        $max = array_shift($count);
        if($a[$data[10]] == ($max - $min) ){
            return true;
        }
        return false;
    }

foreach ($ans as $v[1]) {
    foreach ($ans as $v[2] ) {
        foreach ($ans as $v[3] ) {
            foreach ($ans as $v[4] ) {
                foreach ($ans as $v[5] ) {
                    foreach ($ans as $v[6] ) {
                        foreach ($ans as $v[7] ) {
                            foreach ($ans as $v[8] ) {
                                foreach ($ans as $v[9] ) {
                                    foreach ($ans as $v[10] ) {
                                        for ($i=1 ; $i <=10  ; $i++) {
                                            $data[$i] = $v[$i];
                                        }
                                        for ($i=1; $i <= 10; $i++) {
                                             $fun = "topic_".$i;
                                             if(!$fun($data)) break;
                                        }
                                        if($i == 11){
                                        echo "结果为：".implode(' ',$data)."<br>";
                                        die;
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }
}

