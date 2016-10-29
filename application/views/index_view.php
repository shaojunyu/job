<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <title>四年兼职</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/reset.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/style.css">
</head>
<body>
<div class="logo">
    <img src="<?php echo base_url();?>images/logo.png">
    <p>四年兼职登录</p>
</div>

<form method="POST" action="./login">
    <input type="tel" class="phone" placeholder="请输入手机号" name="cellphone">
    <input type="submit" class="next" value="下一步">
</form>

<a href="<?php echo base_url('business'); ?>" class="business">商家入口</a>

<footer>&copy;四年生活</footer>

<script type="text/javascript" src="<?php echo base_url();?>js/zepto.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/touch.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/entrance.js"></script>
</body>
</html>