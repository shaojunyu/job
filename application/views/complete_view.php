<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<title>兼职选择</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/reset.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/complete.css">
</head>
<body>
	<div class="choose-job">
		<p class="intro1">选择一些你可能会做的兼职<br>（意向调查，有助于精准推荐）</p>

		<div class="ordinary">
			<p>普通兼职</p>
			<ul class="ordinary-part-time-job clearfix">
				<li><a href="javascript:;" class="items">派传单</a></li>
				<li><a href="javascript:;" class="items">家教</a></li>
				<li><a href="javascript:;" class="items">销售</a></li>
				<li><a href="javascript:;" class="items">服务员</a></li>
				<li><a href="javascript:;" class="items">推广</a></li>
				<li><a href="javascript:;" class="items">代理</a></li>
			</ul>
		</div>

		<div class="skill">
			<p>技能兼职</p>
			<ul class="skiil-part-time-job clearfix">
				<li><a href="javascript:;" class="items">海报设计</a></li>
				<li><a href="javascript:;" class="items">PPT制作</a></li>
				<li><a href="javascript:;" class="items">视频制作</a></li>
				<li><a href="javascript:;" class="items">网页开发</a></li>
				<li><a href="javascript:;" class="items">APP开发</a></li>
				<li><a href="javascript:;" class="items">摄影</a></li>
			</ul>
		</div>

		<a href="javascript:;" class="next next1">下一步</a>
	</div>

	<div class="complete-info">
		<p class="intro2">很高兴认识你</p>

		<form>
			<p>
				<span>姓名</span>
				<input type="text" class="name" placeholder="行不更名坐不改姓，表骗">
			</p>
			<p>
				<span>性别</span>
				<a href="javascript:;" class="gender boy">帅气boy</a>
				<a href="javascript:;" class="gender girl">漂亮girl</a>
			</p>
			<p>
				<span>QQ号</span>
				<input type="tel" class="qq" placeholder="做个朋友吧">
			</p>
		</form>

		<a href="javascript:;" class="next next2">下一步</a>
	</div>

	<div class="school-roll">
		<p class="intro3">防怪蜀黍出没，要认证哦</p>
		<form>
			<div class="college-wrapper clearfix">
				<span class="mark">学院</span>
				<div class="college-box">
					<a href="javascript:;" class="choose-college">请选择你所在的学院</a>
					<span class="icon college-icon"></span>
					<div class="college item">
						<a href="javascript:;">电子信息与通信学院</a>
						<a href="javascript:;">机械学院</a>
						<a href="javascript:;">电信学院</a>
						<a href="javascript:;">机械学院</a>
						<a href="javascript:;">电信学院</a>
						<a href="javascript:;">机械学院</a>
						<a href="javascript:;">电信学院</a>
						<a href="javascript:;">机械学院</a>
					</div>
				</div>
			</div>
			
			<div class="grade-wrapper clearfix">
				<span class="mark">年级</span>
				<div class="grade-box">
					<a href="javascript:;" class="choose-grade">选择年级</a>
					<span class="icon grade-icon"></span>
					<div class="grade item">
						<a href="javascript:;">2013</a>
						<a href="javascript:;">2014</a>
						<a href="javascript:;">2015</a>
						<a href="javascript:;">2016</a>
					</div>
				</div>
			</div>
			
			<div class="dormitory-wrapper clearfix">
				<span class="mark">宿舍</span>
				<div class="dormitory-box">
					<input type="text" class="dormitory" placeholder="如：韵苑22栋">
				</div>
			</div>
			<a href="javascript:;" class="next finish">填完啦</a>
		</form>
	</div>

	<!-- 弹出消息 -->
	<div class="prompt-box"></div>

	<script type="text/javascript" src="<?php echo base_url();?>js/zepto.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>js/touch.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>js/complete.js"></script>
</body>
</html>