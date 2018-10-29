<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
<link rel="stylesheet" href="/Public/Admin/css/base.css" />
<link rel="stylesheet" href="/Public/Admin/css/info-reg.css" />
    <title>Document</title>
</head>
<body>
<div class="title"><h2>信息登记</h2></div>
<form action ="" method="post">
    <div class="main">
        <p class="short-input ue-clear">
            <label>部门名称：</label>
            <input type="text" name="qwer" placeholder="部门名称">
        </p>
        <div class="short-input select ue-clear">
            <label>上级部门：</label>
            <div class="select-wrap">
                <select name="pid" id="">
                    <option value="0">顶级部门</option>
                    <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vol["id"]); ?>"><?php echo ($vol["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                </select>
            </div>
        </div>
        <p class="short-input ue-clear">
            <label>排序：</label>
            <input type="text" name="wsad" placeholder="排序">
        </p>
        <p class="short-input ue-clear">
            <label>备注：</label>
            <textarea name="remark" placeholder="备注"></textarea>
        </p>
    </div>
    <div class="btn ue-clear">
        <a href="javascript:;" class="confirm">确定</a>
        <a href="javascript:;" class="clear">清空内容</a>
    </div>
</form>
</body>
<script src="/Public/Admin/js/jquery.js"></script>
<script src="/Public/Admin/js/common.js"></script>
<script src="/Public/Admin/js/WdatePicker.js"></script>
<script>
$(".select-title").on("click",function(){
    $(".select-list").toggle();
    return false;
})
$(".select-list").on("click",function(){
    var txt = $(this).text();
    $(".select-title").find("span").text(txt);
});
showRemind('input[type=text],textarea','placeholder');

//给确定按钮绑定一个点击事件
$(function(){
    $(".confirm").on("click",function(){
        $('form').submit();
    })
    //清空按钮
    $(".clear").on("click",function(){
        $("form").get(0).reset();
    })
})




</script>
</html>