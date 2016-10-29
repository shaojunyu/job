<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<title>查看详情</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/reset.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/view-details.css">
</head>
<body>
	<div class="container">
		<div class="status clearfix">
			<p>已报名人数&nbsp;&nbsp;&nbsp;<span><?php echo count($job_apply); ?>人</span></p>
		</div>

		<div class="details">
			<div class="head clearfix">
				<span>姓名</span>
				<span>手机号</span>
				<span>QQ号</span>
			</div>
			<?php foreach ($job_apply as $apply) { ?>
			<div class="content clearfix">
				<span><?php echo $apply['name']; ?></span>
				<span><?php echo $apply['cellphone']; ?></span>
				<span><?php echo $apply['QQ']; ?></span>
			</div>
			<?php } ?>
		</div>
	</div>

	<div class="bottom-bar">
		<a href="<?php echo base_url('business/job_list'); ?>">发布兼职</a>
		<a href="<?php echo base_url('business'); ?>">商户中心</a>
	</div>
</body>
</html>