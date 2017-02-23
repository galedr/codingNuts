<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>首頁</title>
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/index.css">
		
	</head>
	<body>
		
		<!-- header include -->
		<div class="body_container">

			<div class="top_article
						col-lg-2">
				<ul>
					<li>熱門收藏文章 ： </li>
					<li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus, laborum?</li>
					<li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ullam, rerum.</li>
					<li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima, quo.</li>
					<li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam, omnis!</li>
					<li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa, possimus.</li>
					<li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa, possimus.</li>
					<li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa, possimus.</li>
				</ul>
							
			</div>

			<div class="container content
						col-lg-8">
				<?php 
					foreach ($article_data as $key => $article) {
				 ?>
						<div class="data_container 
									col-lg-4">
							<div class="data">
								<h2><?php echo $article['a_title']; ?></h2>
								<div class="time_class">
									<p><?php echo $article['a_datetime']; ?></p>
									<p><?php echo $article['c_title']; ?></p>
								</div>
								<div class="img">
									<img src="<?php echo $article['a_img']; ?>">
								</div>
								<div class="info">
									
								</div>
								<div class="read_more">
									<button class="btn btn-default" onclick="window.location='<?php base_url(); ?>articles/<?php echo $article['a_id']; ?>'">
										READ MORE
									</button>
								</div>
							</div>
						</div>
				<?php } ?>
				<!-- 分頁 -->
				
				<div class="pagination_container
							col-lg-12">
					<ul class="pagination pagination-sm">
						
						<?php if ($num_page > 1){ ?>
					 		<li><a href="<?php echo base_url(); ?>index?page=1">&laquo;</a></li>
					 	<?php } ?>
					 	<?php
					 		for ($i = (($num_page - $range) - 1); $i < (($num_page + $range) + 1) ; $i++) { 
					 			if (($i > 0) and ($i <= $total_page)) {
					 				if ($i == $num_page) { ?>
					 					<li class="active"><a href="#"><?php echo $num_page; ?></a></li>
					 				<?php } else { ?>
										<li><a href="<?php echo base_url(); ?>index?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
					 				<?php }
					 			}
					 		}
					 	 ?>
					  	
						<?php if ($num_page < $total_page) { ?>
					  		<li><a href="<?php echo base_url(); ?>index?page=<?php echo $total_page; ?>">&raquo;</a></li>
					  	<?php } ?>
					</ul>
				</div>
			</div>
			
			<div class="newest_article
						col-lg-2">
				<ul>
					<li>最新文章 ： </li>
					<li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur, similique?</li>
					<li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Placeat, illo!</li>
					<li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia, inventore.</li>
					<li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Incidunt, voluptate.</li>
					<li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum, quasi.</li>
					<li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa, possimus.</li>
					<li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa, possimus.</li>
				</ul>
			</div>

		</div>
		

		<script>var base_url = "<?php echo base_url(); ?>";</script>
		<script src="<?php echo base_url(); ?>assets/js/index.js"></script>
		<script src="https://code.jquery.com/jquery.js"></script>
		<script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>
