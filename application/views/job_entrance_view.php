<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<title>我的兼职</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/reset.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/job-entrance.css">
</head>
<body>
	<a href="my_job" class="myself"><span>我的兼职</span> 抢到的兼职都在这里 >></a>
	<a href="javascript:;" class="official"><span>官方发布</span> 官方直接发布的兼职都在这里 >></a>
	<a href="javascript:;" class="questionnaire"><span>问卷调查</span> 闲暇填份问卷也能赚点钱 >></a>

	<div class="bottom-bar">
		<a href="javascript:;">我的兼职</a>
		<a href="<?php echo base_url('/user/myself');?>">个人中心</a>
	</div>

	<!-- 弹出消息 -->
	<div class="prompt-box">研发中...</div>

	<script type="text/javascript" src="<?php echo base_url();?>js/zepto.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>js/touch.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>js/job-entrance.js"></script>
</body>
</html>