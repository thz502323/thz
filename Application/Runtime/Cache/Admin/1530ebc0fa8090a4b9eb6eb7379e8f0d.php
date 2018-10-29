<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
<link rel="stylesheet" href="/Public/Admin/css/base.css" />
<link rel="stylesheet" href="/Public/Admin/css/info-reg.css" />
    <title>Document</title>
</head>
<body>
<div class="title"><h2>公文起草</h2></div>
<form action ="" method="post" enctype="multipart/form-data">
    <div class="main">
        <p class="short-input ue-clear">
            <label>标题</label>
            <input type="text" name="title" value="<?php echo ($data["title"]); ?>" placeholder="标题">
            <input type="hidden" name="id" value="<?php echo ($data["id"]); ?>"/>
            <!-- 添加一个隐藏域 -->
        </p>
        <div class="short-input select ue-clear">
            <label>附件</label>
            <div class="select-wrap">
<!--                 <select name="pid" id="">
                    <option value="0">顶级部门</option>
                    <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vol["id"]); ?>"><?php echo ($vol["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                </select>
 -->
                    <input type="file" name="file">

             </div>
        </div>
        <p class="short-input ue-clear">
            <label>作者</label>
            <input type="text" name="author" value="<?php echo ($data["author"]); ?>" placeholder="作者...">
        </p>
        <p class="short-input ue-clear">
            <!-- <label>内容<script id="editor" name="content" type="text/plain" style="width: 800px;height: 500px;"></script></label>
            <textarea placeholder="备注" name="content"> </textarea>  -->
            <label>内容：</label>
            <script id="editor" type="text/plain" name="content" style="width:700px;height:400px;"><?php echo (htmlspecialchars_decode($data["content"])); ?></script>
            <!-- <textarea name="content" style="font-family:Microsoft YaHei !important;font-size: 14px;"
            placeholder="请输入内容..."></textarea> -->
        </p>
    </div>
    <div class="btn ue-clear">
        <a href="javascript:;" class="confirm" id='btnSubmit'>确定</a>
        <a href="javascript:;" class="clear" id='btnReset'>清空内容</a>
    </div>
</form>
</body>
<script src="/Public/Admin/js/jquery.js"></script>
<script src="/Public/Admin/js/common.js"></script>
<script src="/Public/Admin/js/WdatePicker.js"></script>
<script src="/Public/Admin/plugin/ue/ueditor.config.js"></script>
<script src="/Public/Admin/plugin/ue/ueditor.all.min.js"></script>
<script src="/Public/Admin/plugin/ue/lang/zh-cn/zh-cn.js"></script>
<script type="text/javascript">
//实例化 富文本编辑器
var ue = UE.getEditor('editor');

$(".select-title").on("click",function(){
    $(".select-list").toggle();
    return false;
});

$(".select-list").on("click",function(){
    var txt = $(this).text();
    $(".select-title").find("span").text(txt);
});
showRemind('input[type=text],textarea','placeholder');


$(function(){
    $("#btnSubmit").on("click",function(){
        $('form').submit();
    });
    $("#btnReset").on("click",function(){
        $("form").get(0).reset();
    });
});

</script>
</html>