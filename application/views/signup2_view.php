<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<title>注册</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/reset.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/signup2.css">
</head>
<body>
	<div class="logo">
		<img src="<?php echo base_url();?>images/logo.png">
		<p>四年兼职注册</p>
	</div>

	<form>
		<input type="tel" class="phone" placeholder="请输入手机号" value="<?php echo $cellphone;?>">
		<div class="school-box">
			<a href="javascript:;" class="choose">请选择您所在的学校</a>
			<span class="icon"></span>
			<div class="school">
				<a href="javascript:;">华中科技大学</a>
				<a href="javascript:;">武汉大学</a>
			</div>
		</div>
		<input type="password" class="password" placeholder="设置您的密码(至少6位)">
		<a href="javascript:;" class="next">下一步</a>
	</form>

	<script type="text/javascript" src="<?php echo base_url();?>js/zepto.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>js/touch.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>js/signup2.js"></script>
</body>
</html>