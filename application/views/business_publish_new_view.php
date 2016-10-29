<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<title>发布兼职</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/reset.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/release-page1.css">
</head>
<body>
	<form method="POST" action="<?php echo base_url('business/submit_job'); ?>">
		<div class="content1">
			<p class="intro">选择兼职类型</p>

			<div class="ordinary">
				<p>普通兼职</p>
				<ul class="ordinary-part-time-job clearfix">
					<li><a href="javascript:;" class="item">派传单</a></li>
					<li><a href="javascript:;" class="item">家教</a></li>
					<li><a href="javascript:;" class="item">销售</a></li>
					<li><a href="javascript:;" class="item">服务员</a></li>
					<li><a href="javascript:;" class="item">推广</a></li>
					<li><a href="javascript:;" class="item">代理</a></li>
				</ul>
			</div>
			<input type="text" style="display: none;" class="tag1" name="tag1" value="">
			<div class="skill">
				<p>技能兼职</p>
				<ul class="skiil-part-time-job clearfix">
					<li><a href="javascript:;" class="item">海报设计</a></li>
					<li><a href="javascript:;" class="item">PPT制作</a></li>
					<li><a href="javascript:;" class="item">视频制作</a></li>
					<li><a href="javascript:;" class="item">网页开发</a></li>
					<li><a href="javascript:;" class="item">APP开发</a></li>
					<li><a href="javascript:;" class="item">摄影</a></li>
				</ul>
			</div>
			<input type="text" style="display: none;" class="tag2" name="tag2" value="">
			<a href="javascript:;" class="next1">下一步</a>
		</div>
		<div class="content">
			<div class="item2 title clearfix">
				<div>
					<span>兼职标题</span>
				</div>
				<p><input type="text" class="job-title" name="name" placeholder="请输入兼职标题"></p>
			</div>
			<div class="item2 clearfix">
				<div>
					<span>工作日期</span>
				</div>
				<!-- <p><a href="javscript:;" class="begin-c">+开始日期</a><input class="begin date" placeholder="+开始日期" readonly="readonly"> 至 <a href="javscript:;" class="end-c">+结束日期</a><input class="end date" placeholder="+结束日期" readonly="readonly"></p> -->
				<p>&nbsp;&nbsp;&nbsp;<input type="date" class="begin-date" name="start_date" placeholder="开始日期"><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;至<br>&nbsp;&nbsp;&nbsp;<input type="date" class="end-date" name="end_date" placeholder="结束日期"></p>
			</div>
			<div class="item2 clearfix">
				<div>
					<span>兼职时段</span>
				</div>
				<p><input type="text" class="period" name="period" placeholder="请输入兼职时段"><br><label for="period-check"><input id="period-check" class="check1" type="checkbox"> 上班时间不限，完成任务即可</label></p>
			</div>
			<div class="item2 clearfix">
				<div>
					<span>工作地点</span>
				</div>
				<p><input type="text" class="site" name="site" placeholder="请输入兼职地点"><br><label for="site-check"><input id="site-check" class="check2" type="checkbox"> 上班地点不限，完成任务即可</label></p>
			</div>
			<div class="item2 clearfix">
				<div>
					<span>招聘人数</span>
				</div>
				<p><input type="tel" class="number" name="number" placeholder="请输入有效数字">人</p>
			</div>
			<div class="item2 clearfix">
				<div>
					<span>工资待遇</span>
				</div>
				<p><input type="text" class="salary" name="salary" placeholder="请输入工资待遇"></p>
			</div>
			<div class="item2 clearfix">
				<div>
					<span>工作要求</span>
				</div>
				<p><textarea class="requirement" name="requirement" placeholder="请输入相关的工作说明，岗位要求，说明兼职要求及工作要求，必须与实际情况符合，不能有任何隐瞒条件"></textarea></p>
			</div>

			<a href="javascript:;" class="next2">提交兼职</a>
		</div>
	</form>
	<div class="bottom-bar clearfix">
		<a href="<?php echo base_url('business/job_list'); ?>">发布兼职</a>
		<a href="<?php echo base_url('business'); ?>">商户中心</a>
	</div>

	<!-- 弹出消息 -->
	<div class="prompt-box"></div>

	<script type="text/javascript" src="<?php echo base_url();?>js/zepto.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>js/touch.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>js/release-page.js"></script>
</body>
</html>