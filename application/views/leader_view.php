<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<title>领队管理</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/reset.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/leader.css">
</head>
<body>
	<div class="content">
		<div class="title clearfix">
			<span><?php echo $this->session->userdata('name');?></span>
		</div>
		<?php
		foreach ($my_leading_jobs as $leading_job) {
			$res = $this->db->where('id',$leading_job['job_id'])->limit(1)->get('job_job')->result_array();
			$res = $res[0];
		?>
		<div class="part-time-job-item">
			<p class="job"><?php echo $res['name']; ?></p>
			<p class="detailed-info">发布时间：<?php echo $res['create_at']; ?> <a href="<?php echo base_url('leader/job_info/'.$leading_job['job_id']); ?>">&nbsp;&nbsp;详细信息 ></a></p>
			<a href="javascript:;" class="create-link">马上招人，生成我的派单链接</a>
			<a href="<?php echo base_url('leader/apply_info/'.$leading_job['job_id']); ?>" class="view">查看报名情况</a>
		</div>
		<?php } ?>
	</div>

	<!-- <div class="return-box">
		<a href="" class="return">返回</a>
	</div> -->
	<div class="bottom-bar">
		<a href="<?php echo base_url('/user/myjob');?>">我的兼职</a>
		<a href="<?php echo base_url('/user/myself');?>">个人中心</a>
	</div>
</body>
</html>