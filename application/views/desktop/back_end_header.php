<div class="header">
	<div class="logo">
		<img src="https://api.fnkr.net/testimg/200x40/00CED1/FFF/?text=img+placeholder">
	</div>
	<div>
		<p>nowAction</p>
	</div>
	<div class="adminStatus">
		<p>Welcome, <?php echo $admin[0]['a_nickname']; ?></p>
		<p>
			<a href="<?php echo base_url(); ?>logout">登出</a>
		</p>
		<img src="<?php echo $admin[0]['a_img']; ?>" id="adminImg">
	</div>
</div>