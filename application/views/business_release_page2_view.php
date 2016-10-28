<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<title>发布兼职</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/reset.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/release-page2.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/zepto.mdater.css">
</head>
<body>
	<div class="content">
		<div class="item title clearfix">
			<div>
				<span>兼职标题</span>
			</div>
			<p><input type="text" placeholder="请输入兼职标题"></p>
		</div>
		<div class="item clearfix">
			<div>
				<span>工作日期</span>
			</div>
			<!-- <p><a href="javscript:;" class="begin-c">+开始日期</a><input class="begin date" placeholder="+开始日期" readonly="readonly"> 至 <a href="javscript:;" class="end-c">+结束日期</a><input class="end date" placeholder="+结束日期" readonly="readonly"></p> -->
			<p>&nbsp;&nbsp;&nbsp;<input type="date" class="begin-date" placeholder="开始日期"><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;至<br>&nbsp;&nbsp;&nbsp;<input type="date" class="end-date" placeholder="结束日期"></p>
		</div>
		<div class="item clearfix">
			<div>
				<span>兼职时段</span>
			</div>
			<p><input type="text" placeholder="请输入兼职时段"><br><input type="checkbox"> 上班时间不限，完成任务即可</p>
		</div>
		<div class="item clearfix">
			<div>
				<span>工作地点</span>
			</div>
			<p><input type="text" placeholder="请输入兼职地点"><br><input type="checkbox"> 上班地点不限，完成任务即可</p>
		</div>
		<div class="item clearfix">
			<div>
				<span>招聘人数</span>
			</div>
			<p><input type="tel" placeholder="请输入有效数字">人</p>
		</div>
		<div class="item clearfix">
			<div>
				<span>工资待遇</span>
			</div>
			<p><input type="text" placeholder="请输入工资待遇"></p>
		</div>
		<div class="item clearfix">
			<div>
				<span>工作要求</span>
			</div>
			<p><textarea placeholder="请输入相关的工作说明，岗位要求，说明兼职要求及工作要求，必须与实际情况符合，不能有任何隐瞒条件"></textarea></p>
		</div>

		<a href="javascript:;" class="next">下一步</a>
	</div>

	<div class="bottom-bar">
		<a href="javascript:;">发布兼职</a>
		<a href="javascript:;">商户中心</a>
	</div>

	<script type="text/javascript" src="<?php echo base_url();?>js/zepto.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>js/touch.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>js/release-page2.js"></script>
</body>
</html>