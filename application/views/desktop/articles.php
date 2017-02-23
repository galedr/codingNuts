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

		</div>
		
		<!-- 推薦相關文章 -->

		<div class="recommand_href container
					col-lg-8 col-lg-offset-2">
			<?php 
				foreach ($recommand as $key => $recom) { ?>
					<div class="recommand_col container
								col-lg-2">
						<img src="<?php echo $recom['a_img']; ?>">
						<p><?php echo $recom['a_title']; ?></p>
					</div>
			<?php } ?>

		</div>
		
		<script src="https://code.jquery.com/jquery.js"></script>
		<script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>