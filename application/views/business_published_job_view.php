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
			<p class="title"><?php echo $job['name']; ?></p>
			<p class="detailed">发布时间：<span class="time"><?php echo $job['create_at']; ?></span>&nbsp;&nbsp;<a href="<?php echo base_url('business/job_info/'.$job['id']); ?>">查看详情 ></a></p>
			<div class="link-box clearfix">
				<?php if (empty($job['pingpp_id']) ) { ?>
				<div class="pay"><a href="<?php echo base_url('business/pay'); ?>">支付押金</a></div>
				<?php }else{ 
					$this->db->where('pingpp_id',$job['pingpp_id'])->where('paid','YES');
					if ($this->db->count_all_results('pay') == 1) { ?>
						<div><a href="<?php echo base_url('business/apply_info/'.$job['id']); ?>">报名情况</a></div>
						<div><a href="javascript:;">发工资</a></div>		
				<?php }else{ ?>
					<div class="pay"><a href="<?php echo base_url('business/pay/'.$job['id']); ?>">支付押金</a></div>
				<?php } } ?>
			</div>
		</div>
		<?php } ?>
	</div>

	<div class="release-wrapper"><a href="<?php echo base_url('business/publish_new'); ?>" class="release">发布新的兼职</a></div>

	<div class="bottom-bar clearfix">
		<a href="<?php echo base_url('business/job_list'); ?>">发布兼职</a>
		<a href="<?php echo base_url('business'); ?>">商户中心</a>
	</div>

	<script type="text/javascript" src="<?php echo base_url();?>js/zepto.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>js/touch.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>js/my-job.js"></script>
</body>
</html>