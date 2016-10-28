<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<title>商户中心</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/reset.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/business.css">
</head>
<body>
	<div class="content">
		<p class="clearfix">
			<sapn>商家名称：</sapn>
			<span><?php echo $this->session->userdata('name'); ?></span>
		</p>
		<p class="clearfix">
			<sapn>联系电话：</sapn>
			<span><?php echo $this->session->userdata('cellphone'); ?></span>
		</p>
		<p class="clearfix">
			<sapn>商家地址：</sapn>
			<span><?php echo $this->session->userdata('location'); ?></span>
		</p>
	</div>

	<div class="bottom-bar">
		<a href="javascript:;">发布兼职</a>
		<a href="javascript:;">商户中心</a>
	</div>
</body>
</html>