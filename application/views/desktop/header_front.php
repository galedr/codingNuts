<?php
	if (!isset($_SESSION['codingNuts_member'])) {

	 	$login_status = "unloging";

	 } else {

	 	$login_status = "login";

	 	$member = $this->front_end_model->get_member_file($_SESSION['codingNuts_member']);

	 	if (isset($_SESSION['article_collect'][$_SESSION['codingNuts_member']])) {
	 			
	 		$collect = $_SESSION['article_collect'][$_SESSION['codingNuts_member']];

	 		$collect_article = array();
	 		foreach ($collect as $art => $value) {
	 			
	 			$collect_article[] = $this->front_end_model->article($art);
	 		}
		 }
	 }
?>		
<div class="container header">
					
	<div class="logoHolder col-lg-12">
		<div class="logo
					col-lg-4 col-lg-offset-4">
			<a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/websiteImg/logo.png"></a>
		</div>
		<div class="member
					col-lg-2 col-lg-offset-2">
			<!-- 未登入 -->
			<?php if ($login_status == 'unloging') { ?>
				<a data-toggle="modal" href="#member_login">會員登入</a>
			<?php } else { ?>
			<!-- 已登入 -->
				<p>Welcome, <?php echo $member[0]['m_nickname']; ?> / <a href="#m_collect" data-toggle="modal">收藏</a> / <a href="<?php echo base_url(); ?>member_logout">登出</a>
				</p>
			<?php } ?>
		</div>
	</div>
	
	<!-- 會員登入，彈出視窗 -->
	<div class="modal fade" id="member_login">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">會員登入</h4>
				</div>

				<form method="post" action="<?php echo base_url(); ?>member_login">
					<div class="modal-body">
						<div class="input-group">
							<input type="text" class="form-control" placeholder="sample" name="member_account">
							<span class="input-group-addon" >帳號</span>
						</div>
					</div>
					<div class="modal-body">
						<div class="input-group">
							<input type="password" class="form-control" placeholder="sample" name="member_password">
							<span class="input-group-addon" >密碼</span>
						</div>
					</div>
					<div class="modal-body">
						<a href="#member_resign" data-toggle="modal" data-dismiss="modal">			還沒有帳號？
						</a>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
						<button type="submit" class="btn btn-primary">送出</button>
					</div>
				</form>

			</div>
		</div>
	</div>

	<!-- 會員註冊，彈出視窗 -->
	<div class="modal fade" id="member_resign">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">會員註冊</h4>
				</div>

				<form enctype="multipart/form-data" method="post" action="<?php echo base_url(); ?>member_resign">
					<div class="modal-body">
						<div class="img_preview">
							<img src="">
						</div>
						<div>
							<label for="m_img">選擇會員照片 ：</label>
							<input type="file" name="m_img" class="form-control">
						</div>
						<div>
							<label for="m_account">請輸入帳號 ：</label>
							<input type="text" name="m_account" class="form-control">
						</div>
						<div>
							<label for="m_password">請輸入密碼 ：</label>
							<input type="password" name="m_password" class="form-control">
						</div>
						<div>
							<label for="m_password_re">驗證密碼 ：</label>
							<input type="password" name="m_password_conf" class="form-control">
						</div>
						<div>
							<label for="m_nickname">輸入您的暱稱 ：</label>
							<input type="text" name="m_nickname" class="form-control">
						</div>
					</div>
					
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
						<button type="submit" class="btn btn-primary" id="member_resign_btn">註冊</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	<!-- 會員收藏，彈出視窗 -->
	<div class="modal fade" id="m_collect">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">我的收藏</h4>
				</div>
				<div class="modal-body">
					<?php foreach ($collect_article as $key => $collect) { ?>
					<div class="collect_holder">
						<div>
							<img src="<?php echo $collect[0]['a_img']; ?>">
						</div>
						<div onclick="window.location='<?php echo base_url(); ?>articles/<?php echo $collect[0]['a_id']; ?>'">
							<p><?php echo $collect[0]['a_title']; ?></p>
						</div>
						<div>
							<img src="<?php echo base_url(); ?>assets/websiteImg/delete.png" onclick="unset_collect(<?php echo $collect[0]['a_id']; ?>,'<?php echo $_SESSION['codingNuts_member']; ?>')">
						</div>
					</div>
					<?php } ?>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">離開</button>
				</div>
			</div>
		</div>
	</div>
	

	<div class="introList
				col-lg-12">
		<div class="col-lg-4 col-lg-offset-4">
			<p>&#8853 <a href="#">About</a></p>
			<p>&#8853 <a href="#">Article List</a></p>
		</div>
	</div>
	<form action="<?php echo base_url(); ?>tag/1" method="get">
		<div class="searchBar_container
					col-lg-12">
			<div class="col-lg-4 col-lg-offset-4">
				<div class="input-group searchBar">
					
					<input type="text" class="form-control" placeholder="請輸入關鍵字" name="s_val">
					<input type="hidden" name="s_key" value="tag">
					<span class="input-group-btn" id="index_search">
				    	<button class="btn btn-info" type="submit">搜尋</button>
					</span>
					
				</div>
			</div>			
		</div>
	</form>
	<div class="classList_container
				col-lg-12">
		<ul class="classList">
		<?php  
			foreach ($category as $key => $cate) {

				if(!isset($search_txt)){ ?>

					<li value="<?php echo $cate['c_title']; ?>"><?php echo $cate['c_title']; ?></li>

			<?php } else {

					if ($cate['c_title'] == $search_txt) {	?>

						<li style="
							background-color: #FF8800;
							border: 1px solid #FF8800;
							color: white;" value="<?php echo $cate['c_title']; ?>">
							<?php echo $cate['c_title']; ?>	
						</li>
						
				<?php } else { ?>

						<li value="<?php echo $cate['c_id']; ?>"><?php echo $cate['c_title']; ?></li>

				<?php } ?>
			<?php } ?>
		<?php } ?>
		</ul>
	</div>
	
</div>
		
		


