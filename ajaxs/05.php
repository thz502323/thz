<?php
/**
 * @Author: Marte
 * @Date:   2018-02-06 13:55:29
 * @Last Modified by:   伪中二
 * @Last Modified time: 2018-03-03 13:54:26
 */
$subject = "php&detail=html";

//php处理文本中的特殊字符函数urlencode() urldecode()反编码
$subject = urlencode($subject);

echo "<a href='./04.php?sjt=$subject'>php05</a>";
