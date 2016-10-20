<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<title>四年生活商家登录</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/reset.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/business-login.css">
</head>
<body>
	<div class="content">
		<div class="logo">
			<img src="images/logo.png">
			<p>四年兼职商家版</p>
		</div>

		<form>
			<input type="tel" class="phone" placeholder="请输入手机号">

			<div class="codes-box clearfix">
				<input type="tel" class="codes" placeholder="输入验证码">
				<a href="javascript:;" class="get">获取验证码</a>
			</div>
			
			<a href="javascript:;" class="next">确认登录</a>
			<a href="javascript:;" class="cooperation">商家初次合作申请</a>
		</form>
	</div>

	<footer>&copy;四年生活</footer>

	<script type="text/javascript" src="<?php echo base_url();?>js/zepto.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>js/touch.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>js/business-login.js"></script>
</body>
</html>