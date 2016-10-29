<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<title>发布兼职</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/reset.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/release-payment.css">
</head>
<body>
	<div class="content">
		<p>本次您需要支付的费用为</p>
		<p><?php echo $job['number'].'x 10 = '.$job['number']*10; ?>元	</p>
		<a href="javascript:;">现在支付</a>
		<p>您需要确保您如实全部填写了兼职信息，我们将完全按照您所写招兼职。招募到相应数量兼职招募就会暂停，除非招募人数不够，否则费用不退。</p>
	</div>

	<div class="bottom-bar">
		<a href="<?php echo base_url('business/job_list'); ?>">发布兼职</a>
		<a href="<?php echo base_url('business'); ?>">商户中心</a>
	</div>
</body>
</html>