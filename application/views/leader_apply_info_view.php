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
			<p>已报名人数&nbsp;&nbsp;<span><?php echo count($applied_users); ?>人</span></p>
		</div>

		<table class="participation-box">
			<tr>
				<th>姓名</th>
				<th>手机号</th>
				<th>QQ号</th>
				<th>状态</th>
			</tr>

			<?php foreach ($applied_users as $user) { ?>
			<tr>
				<td><?php echo $user['username']; ?></td>
				<td><?php echo $user['cellphone']; ?></td>
				<td><?php echo $user['QQ']; ?></td>
				<td></td>
			</tr>
			<?php } ?>
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