<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<title>积分</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/reset.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/points.css">
</head>
<body>
	<div class="content">
		<p class="title">坚持下去，就是奇迹</p>
		<div class="points-info clearfix">
			<div>
				<p><span class="red-round"></span>总积分</p>
				<p>8888.00元</p>
			</div>
			<div>
				<p><span class="blue-round"></span>剩余积分</p>
				<p>888.00元</p>
			</div>
		</div>
		<div class="exchange">
			<a href="javscript:;">积分换好礼</a>
		</div>

		<?php
		$total = 0;
		$left = 0;

		foreach ($point_array as $point){
			$left +=$point['point'];
			if ($point['point']>0){$total += $point['point'];}
		?>
		<div class="points-change clearfix">
			<p><?php  echo $point['createAt']?><span>&nbsp;&nbsp;&nbsp;
				<?php if($point['point']>0){echo '获得积分';}else{echo '使用积分';}?>
				</span></p>
			<p><?php  echo $point['point']?></p>
			<p><?php  echo $point['remark']?></p>
		</div>
		<?php }?>
		<div><?php echo $total;?></div>
		<div><?php echo $left;?></div>
	</div>

	<div class="bottom-bar">
		<a href="javascript:;">我的兼职</a>
		<a href="javascript:;">个人中心</a>
	</div>
</body>
</html>