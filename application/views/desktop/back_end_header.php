<?php
	if (!isset($_SESSION['codingNuts_admin'])) {
		$data['error_message'] = "請先登入管理者帳號";
		$data['redirect'] = base_url()."back_end/admin_login";

		$this->load->view('desktop/error_page', $data);
		return;
	}
?>
<div class="header">
	<div class="logo">
		<img src="<?php echo base_url(); ?>assets/websiteImg/logo.png" 
			style="width: 100%; height: auto; max-width: 200px; cursor: pointer;"
			onclick="window.location='<?php echo base_url(); ?>back_end'">
	</div>
	<div>
		<p>nowAction</p>
	</div>
	<div class="adminStatus">
		<p>Welcome, <?php echo $admin[0]['a_nickname']; ?></p>
		<p>
			<a href="<?php echo base_url(); ?>admin_logout">登出</a>
		</p>
		<img src="<?php echo $admin[0]['a_img']; ?>" id="adminImg">
	</div>
</div>