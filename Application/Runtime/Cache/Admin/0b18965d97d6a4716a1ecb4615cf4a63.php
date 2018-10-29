<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Document</title>
</head>
<body>

    <?php if(is_array($array1)): $i = 0; $__LIST__ = $array1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i; echo ($vol[0]); ?>-<?php echo ($vol[1]); ?>
        <!-- <?php if(is_array($vol)): $i = 0; $__LIST__ = $vol;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; echo ($vo); ?>-<?php endforeach; endif; else: echo "" ;endif; ?> --><?php endforeach; endif; else: echo "" ;endif; ?>
    <?php if($day==1): ?>星期一
    <?php elseif($day==2): ?>
    星期二
    <?php elseif($day==3): ?>
    星期三
    <?php elseif($day==4): ?>
    星期四
    <?php elseif($day==5): ?>
    星期五
    <?php elseif($day==6): ?>
    星期六
    <?php else: ?>
    星期天<?php endif; ?>

</body>
</html>