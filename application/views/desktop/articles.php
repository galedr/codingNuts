<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>文章內容</title>
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/articles.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/header_front.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/footer_front.css">
		<script src="<?php echo base_url(); ?>assets/js/jquery-3.1.1.min.js"></script>
	</head>
	<body>
				
		
		<div class="article_holder container
					col-lg-8 col-lg-offset-2">
			
			<div class="title">
				<h2><?php echo $article[0]['a_title']; ?></h2>
				<p><?php echo $article[0]['a_datetime']; ?></p>
			</div>

			<div class="article">
				<?php echo $article[0]['a_content']; ?>
			</div>
			<div class="option">
				<div>

					<?php //檢查本篇文章是否有被收藏
						if (isset($_SESSION['article_collect'][$_SESSION['codingNuts_member']][$article[0]['a_id']])) {
							$bgc = base_url()."assets/websiteImg/heart_red.png";
						} else {
							$bgc = base_url()."assets/websiteImg/heart_black.png";
						}

						if (isset($_SESSION['codingNuts_member'])) {
					?>

						<img src="<?php echo $bgc; ?>" onclick="collect_check(<?php echo $article[0]['a_id']; ?>)" id="collect_img">

					<?php } else { ?>
						
						<img src="<?php echo $bgc; ?>" onclick="alert('請先登入會員')" id="collect_img">

					<?php } ?>
				</div>
			</div>
		</div>
		
		<!-- 推薦相關文章 -->

		<div class="recommand_href container
					col-lg-8 col-lg-offset-2">
			<div class="container">
				<p>您可能會有興趣 ： </p>
			</div>	
			<?php 
				foreach ($recommand as $key => $recom) { ?>
					<div class="recommand_col container
								col-lg-2" onclick="window.location='<?php echo base_url(); ?>articles/<?php echo $recom['a_id']; ?>'">
						<img src="<?php echo $recom['a_img']; ?>">
						<p><?php echo $recom['a_title']; ?></p>
					</div>
			<?php } ?>

		</div>
		
		<script src="https://code.jquery.com/jquery.js"></script>
		<script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>