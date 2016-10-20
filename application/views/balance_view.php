<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<title>钱包余额</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/reset.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/balance.css">
</head>
<body>
	<div class="content">
		<p class="title">华小科，感谢这么努力的自己</p>
		<div class="money-info clearfix">
			<div>
				<p><span class="red-round"></span>已挣金额</p>
				<p class="total-money"></p>
			</div>
			<div>
				<p><span class="blue-round"></span>钱包余额</p>
				<p class="left-money"></p>
			</div>
		</div>
		<div class="get-money">
			<a href="javscript:;">提现到支付宝</a>
			<p>每周五可以提现哦</p>
		</div>

		<?php
		$total = 0;
		$left = 0;
		foreach ($trade_array as $trade){
			$left += $trade['amount'];
			if ($trade['amount'] > 0){
				$total += $trade['amount'];
		?>

		<div class="pay clearfix">  <!-- 发工资 -->
			<div>
				<p><?php echo $trade['createAt'];?><span>&nbsp;&nbsp;&nbsp;收入</span></p>
				<p><?php echo $trade['remark'];?></p>
			</div>
			<div>
				<p><?php echo $trade['amount'];?>元</p>
				<p>已完成</p>
			</div>
		</div>
				<?php } if ($trade['amount'] < 0){?>
		<div class="withdraws-cash clearfix">  <!-- 提现 -->
			<div>
				<p><?php echo $trade['createAt'];?><span>&nbsp;&nbsp;&nbsp;提现</span></p>
				<p><?php echo $trade['remark'];?></p>
			</div>
			<div>
				<p><?php echo $trade['amount'];?>元</p>
				<p>已完成</p>
			</div>
		</div>
			<?php }?>

		<?php } //end foreach?>
		<div class="total"><?php echo $total;?></div>
		<div class="left"><?php echo $left;?></div>
	</div>

	<div class="bottom-bar">
		<a href="javascript:;">我的兼职</a>
		<a href="<?php echo base_url('/user/myself');?>">个人中心</a>
	</div>

	<script type="text/javascript" src="<?php echo base_url();?>js/zepto.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>js/touch.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>js/leader.js"></script>
</body>
</html>