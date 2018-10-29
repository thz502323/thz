<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Document</title>
</head>
<body>
    中括号模式：<?php echo ($array[0]); ?>-<?php echo ($array[1]); ?>-<?php echo ($array[2]); ?>-<?php echo ($array[3]); ?><br>
    点模式：<?php echo ($array["0"]); ?>-<?php echo ($array["1"]); ?>-<?php echo ($array["2"]); ?>-<?php echo ($array["3"]); ?><hr>
    中括号模式：<?php echo ($array1[0][0]); ?>  <?php echo ($array1[0][1]); ?>  <?php echo ($array1[0][2]); ?><br>
    点模式：<?php echo ($array1["1"]["0"]); ?>  <?php echo ($array1["1"]["3"]); ?>
</body>
</html>