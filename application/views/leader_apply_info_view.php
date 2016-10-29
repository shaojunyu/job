<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<title>报名详情</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/reset.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/apply-info.css">
</head>
<body>
	<div class="content">
		<div class="title clearfix">
			<p>已报名人数&nbsp;&nbsp;<span>8人</span></p>
			<p>最终人数&nbsp;&nbsp;<span>6人</span></p>
			<p>您的收益为&nbsp;&nbsp;<span>70元</span></p>
			<p><a href="javascript:;" class="transfer">转到余额</a></p>
		</div>

		<p class="prompt">提示：收益会在后台确认此兼职确实参与之后显示</p>

		<table class="participation-box">
			<tr>
				<th>姓名</th>
				<th>手机号</th>
				<th>QQ号</th>
				<th>状态</th>
			</tr>

			<tr>
				<td>华小科</td>
				<td>13166668888</td>
				<td>123456789</td>
				<td>确认参与</td>
			</tr>
		</table>
	</div>

	<!-- <div class="return-box">
		<a href="" class="return">返回</a>
	</div> -->

	<div class="bottom-bar">
		<a href="<?php echo base_url('/user/myjob');?>">我的兼职</a>
		<a href="<?php echo base_url('/user/myself');?>">个人中心</a>
	</div>

	<script type="text/javascript" src="<?php echo base_url();?>js/zepto.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>js/touch.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>js/apply-info.js"></script>
</body>
</html>