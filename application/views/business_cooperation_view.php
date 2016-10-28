<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<title>商家合作申请</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/reset.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/cooperation.css">
</head>
<body>
	<div class="content">
		<div class="logo">
			<img src="<?php echo base_url();?>images/logo.png">
			<p>四年兼职商家合作申请</p>
		</div>

		<form>
			<input type="text" class="business-name" placeholder="请输入商家名称">
			<input type="text" class="address" placeholder="请输入商户地址">
			<input type="text" class="name" placeholder="请输入联系人姓名">
			<input type="tel" class="phone" placeholder="请输入手机号">
			<input type="text" class="describe" placeholder="请大概描述您需要什么样的兼职">
			
			<a href="javascript:;" class="next">确认申请</a>
			<p>申请后请耐心等待客服与您联系</p>
		</form>
	</div>

	<footer>&copy;四年生活</footer>

	<script type="text/javascript" src="<?php echo base_url();?>js/zepto.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>js/touch.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>js/cooperation.js"></script>
</body>
</html>