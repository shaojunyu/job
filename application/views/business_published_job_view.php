<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<title>发布兼职</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/reset.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/release-job.css">
</head>
<body>
	<div class="content">
	<?php
		foreach ($published_jobs as $job) {
	 ?>
		<div class="job">
			<p class="title">四年生活线下试卷销售</p>
			<p class="detailed">发布时间：<span class="time">2016.09.19 23:39</span>&nbsp;&nbsp;<a href="javascript:;">查看详情 ></a></p>
			<div class="link-box clearfix">
				<div><a href="javascript:;">报名情况</a></div>
				<div><a href="javascript:;">发工资</a></div>
			</div>
		</div>
		<?php } ?>

		<div class="job">
			<p class="title">四年生活线下试卷销售</p>
			<p class="detailed">发布时间：<span class="time">2016.09.19 23:39</span>&nbsp;&nbsp;<a href="javascript:;">查看详情 ></a></p>
			<div class="link-box clearfix">
				<div class="pay"><a href="javascript:;">支付押金</a></div>
			</div>
		</div>
	</div>

	<div class="release-wrapper"><a href="<?php echo base_url('business/publish_new'); ?>" class="release">发布新的兼职</a></div>

	<div class="bottom-bar clearfix">
		<a href="<?php echo base_url('business/published'); ?>">发布兼职</a>
		<a href="<?php echo base_url('business'); ?>">商户中心</a>
	</div>

	<script type="text/javascript" src="<?php echo base_url();?>js/zepto.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>js/touch.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>js/my-job.js"></script>
</body>
</html>