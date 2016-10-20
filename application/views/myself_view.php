<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<title>个人中心</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/reset.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/myself.css">
</head>
<body>
	<div class="content">
		<div class="info-box clearfix">
			<div class="head-portrait">
				<img src="<?php echo base_url();?>images/<?php echo $this->session->userdata('sex')=='男'?'boy':'girl'; ?>.png">
				<p>暂未保障权益</p>
			</div>
			<div class="info">
				<p class="name"><?php echo $this->session->userdata('name');?></p>
				<p>等级：4.5（满级5）</p>
				<p>学校：<?php echo $this->session->userdata('school');?></p>
				<p>手机：<?php echo $this->session->userdata('cellphone');?></p>
				<?php
				if ($this->session->userdata('isLeader') == 'YES'){
				?>
				<a href="../leader" class="leader">领队管理入口</a>
				<?php } ?>
			</div>
		</div>

		<div class="money-and-points clearfix">
			<a href="./balance" class="money">
				<p>钱包余额</p>
				<p><?php echo $balance; ?>元</p>
				<span>点击查看明细、工资及提现</span>
			</a>
			<a href="./point" class="points">
				<p>当前积分</p>
				<p><?php echo $point;?>分</p>
				<span>积分换礼，感谢你</span>
			</a>
		</div>

		<div class="guarantee">
			<a href="javascript:;" class="get-guarantee">限时优惠 兼职保障4年仅9.9元</a>
			<p>兼职保障<br>1、工资先行赔付，如果遇到商家不按照约定发工资，平台立即介入处理，并先行赔付兼职损失；<br>2、兼职保险，如果兼职过程中出现意外伤害，平台先行赔付医药费；<br>3、现在购买奖励100积分。</p>
		</div>
	</div>


	<div class="bottom-bar">
		<a href="<?php echo base_url('/user/myjob');?>">我的兼职</a>
		<a href="<?php echo base_url('/user/myself');?>">个人中心</a>
	</div>
</body>
</html>