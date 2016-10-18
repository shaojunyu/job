<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <title>登录</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/reset.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/login.css">
</head>
<body>
<div class="logo">
    <img src="<?php echo base_url();?>images/logo.png">
    <p>四年兼职登录</p>
</div>

<form>
    <input type="tel" class="phone" placeholder="" value="<?php echo $cellphone;?>">

    <div class="password-box">
        <input type="password" class="password" placeholder="请输入密码">
    </div>

    <div class="codes-box clearfix">
        <input type="tel" class="codes" placeholder="输入验证码">
        <a href="javascript:;" class="get">获取验证码</a>
    </div>

    <a href="javascript:;" class="next-by-passwd">下一步</a>
    <a href="javascript:;" class="next-by-codes">下一步</a>
</form>

<div class="choose-box">
    <a href="javascript:;" class="login-codes">使用验证码登录</a>
    <a href="javascript:;" class="login-passwd">使用密码登录</a>
</div>

<!-- 弹出消息 -->
<div class="prompt-box"></div>

<script type="text/javascript" src="<?php echo base_url();?>js/zepto.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/touch.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/login.js"></script>
</body>
</html>