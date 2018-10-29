<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/Public/Admin/css/base.css" />
    <link rel="stylesheet" href="/Public/Admin/css/login.css" />
    <title>移动办公自动化系统</title>
   <style type="text/css" media="screen">

     input:-webkit-autofill{
          -webkit-box-shadow: 0 0 0px 195px white inset;
          border: 1px solid #CCC!important
    }

        .btn:hover {
        background:rgba(46, 132, 205, 0.2);
        color:red;
    }

    .captcha{
        width:85px;
        height: 39px;
        position:absolute;
        right:-17px;
        border-radius:5px
    }
   </style>

</head>
<body>
    <div id="container">.
    <form action="<?php echo U('checkLogin');?>" method="post">
        <div id="bd">
            <div class="login1">
                <div class="login-top"><h1 class="logo"></h1></div>
                <div class="login-input">
                    <p class="user ue-clear">
                        <label>用户名</label>
                        <input id='user-name1' type="text" name="username" />
                    </p>
                    <p class="password ue-clear">
                        <label>密&nbsp;&nbsp;&nbsp;码</label>
                        <input type="password" name="password" />
                    </p>
                    <p class="yzm ue-clear">
                        <label>验证码</label>
                        <input type="text" autocomplete="off" name="captcha" maxlength="4" />
                        <cite><img class='captcha' width="" height="" src="/index.php/Admin/Public/captcha" onclick="this.src='/index.php/Admin/Public/captcha/t/'+Math.random()" /></cite>
                    </p>
                </div>
                <div class="login-btn ue-clear">
                    <a href="javascript:;" class="btn">登录</a>
                    <div class="remember ue-clear">
                        <input type="checkbox" id="remember" />
                        <em></em>
                        <label class='rem' for="remember">记住密码</label>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
    <div id="ft">CopyRight&nbsp;2014&nbsp;&nbsp;版权所有&nbsp;&nbsp;uimaker.com专注于ui设计&nbsp;&nbsp;苏ICP备09003079号</div>
</body>
<script type="text/javascript" src="/Public/Admin/js/jquery.js"></script>
<script type="text/javascript" src="/Public/Admin/js/common.js"></script>
<script type="text/javascript">
var height = $(window).height();
$("#container").height(height);
$("#bd").css("padding-top",height/2 - $("#bd").height()/2);

$(window).resize(function(){
    var height = $(window).height();
    $("#bd").css("padding-top",$(window).height()/2 - $("#bd").height()/2);
    $("#container").height(height);

});

$('#remember').focus(function(){
   $(this).blur();
});

$('#remember').click(function(e) {
    checkRemember($(this));
});

function checkRemember($this){
    if(!-[1,]){
         if($this.prop("checked")){
            $this.parent().addClass('checked');
        }else{
            $this.parent().removeClass('checked');
        }
    }
}

$(function(){
    $(".login1 .login-btn .btn").click(function(){
        $("form").submit();
    })
})
</script>
</html>