<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<title>注册</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/reset.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/signup1.css">
</head>
<body>
	<div class="logo">
		<img src="<?php echo base_url();?>images/logo.png">
		<p>四年兼职注册</p>
	</div>

	<form method="POST" action="../signup2">
		<input type="tel" class="phone" name="cellphone" placeholder="手机号" value="<?php if(empty($cellphone)){echo '';}else{echo $cellphone;} ?>">

		<div class="codes-box clearfix">
			<input type="tel" class="codes" placeholder="输入验证码">
			<a href="javascript:;" class="get">获取验证码</a>
		</div>
		
		<input type="submit" class="next" value="下一步">
	</form>

	<script type="text/javascript" src="<?php echo base_url();?>js/zepto.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>js/touch.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>js/signup1.js"></script>
</body>
</html>