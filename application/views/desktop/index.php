<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>首頁</title>
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/index.css">
		<script src="<?php echo base_url(); ?>assets/js/jquery-3.1.1.min.js"></script>
		<!-- header部分 -->
		<script src="<?php echo base_url(); ?>assets/js/header_front.js"></script>
		
	</head>
	<body>
		<?php $this->load->view("desktop/header_front"); ?>
		<!-- header include -->
		<div class="body_container">

			<div class="top_article
						col-lg-2">
				<ul>
					<li>最新文章 ： </li>
					<?php foreach ($newest_article as $key => $na) { ?>
						<li 
						style="cursor: pointer;"
						onclick="window.location='<?php base_url(); ?>articles/<?php echo $na['a_id']; ?>'">
							<?php echo $na['a_title']; ?>
							
						</li>
					<?php } ?>
				</ul>
							
			</div>

			<div class="container content
						col-lg-8">
				<?php 
					foreach ($articles as $key => $arts) {
				 ?>
						<div class="data_container 
									col-lg-4">
							<div class="data">
								<h2><?php echo $arts['a_title']; ?></h2>
								<div class="time_class">
									<p><?php echo $arts['a_datetime']; ?></p>
									<p><?php echo $arts['c_title']; ?></p>
								</div>
								<div class="img">
									<img src="<?php echo $arts['a_img']; ?>">
								</div>
								<div class="info">
									
								</div>
								<div class="read_more">
									<button class="btn btn-default" onclick="window.location='<?php echo base_url(); ?>articles/<?php echo $arts['a_id']; ?>'">
										READ MORE
									</button>
								</div>
							</div>
						</div>
				<?php } ?>
				<!-- 分頁 -->
				
				<div class="pagination_container
							col-lg-12">
					<?php $this->load->view("desktop/pagination"); ?>
				</div>
			</div>


		</div>
		
		<?php $this->load->view("desktop/footer_front"); ?>

		<script>var base_url = "<?php echo base_url(); ?>";</script>
		<script src="<?php echo base_url(); ?>assets/js/index.js"></script>
		<script src="https://code.jquery.com/jquery.js"></script>
		<script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>
