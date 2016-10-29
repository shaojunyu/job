<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<title>兼职详情</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/reset.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/job-info.css">
</head>
<body>
	<div class="content">
		<div class="item title clearfix">
			<div>
				<span>网页开发</span>
			</div>
			<p><?php echo $job['name']; ?></p>
		</div>
		<div class="item clearfix">
			<div>
				<span>工作日期</span>
			</div>
			<p><?php echo $job['start_date']."至".$job['end_date']; ?></p>
		</div>
		<div class="item clearfix">
			<div>
				<span>兼职时段</span>
			</div>
			<p><?php echo $job['period']=='anytime'?"具体工作时间不限,完成工作即可":$job['period']; ?></p>
		</div>
		<div class="item clearfix">
			<div>
				<span>工作地点</span>
			</div>
			<p><?php echo $job['site']=='anywhere'?"具体工作地点不限,完成工作即可":$job['site']; ?></p>
		</div>
		<div class="item clearfix">
			<div>
				<span>招聘人数</span>
			</div>
			<p><?php echo $job['number']; ?>&nbsp;&nbsp;&nbsp;人</p>
		</div>
		<div class="item clearfix">
			<div>
				<span>工资待遇</span>
			</div>
			<p><?php echo $job['salary']; ?></p>
		</div>
		<div class="item clearfix">
			<div>
				<span>工作要求</span>
			</div>
			<ul>
			<?php echo $job['requirement']; ?>
			</ul>
		</div>
	</div>

	<div class="bottom-bar">
		<a href="<?php echo base_url('/user/myjob');?>">我的兼职</a>
		<a href="<?php echo base_url('/user/myself');?>">个人中心</a>
	</div>
</body>
</html>