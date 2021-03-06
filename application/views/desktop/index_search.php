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
					<li>最新文章 ： </li>
					<?php foreach ($newest_article as $key => $article) { ?>
						<li
							style="cursor: pointer;"
							onclick="window.location='<?php echo base_url(); ?>articles/<?php echo $article['a_id']; ?>'">
							<?php echo $article['a_title']; ?>
						</li>	
					<? } ?>
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
				<?php if (isset($search_key) and ($search_key == 'tag')) { ?>
					<!-- tag search -->
					<div class="pagination_container
								col-lg-12">
						<ul class="pagination pagination-sm">
							
							<?php if ($num_page > 1){ ?>
						 		<li><a href="javascript:;" onclick="tag_search(1);">&laquo;</a></li>
						 	<?php } ?>
						 	<?php
						 		for ($i = (($num_page - $range) - 1); $i < (($num_page + $range) + 1) ; $i++) { 
						 			if (($i > 0) and ($i <= $total_page)) {
						 				if ($i == $num_page) { ?>
						 					<li class="active"><a href="javascript:;"><?php echo $num_page; ?></a></li>
						 				<?php } else { ?>
											<li><a href="javascript:;" onclick="tag_search(<?php echo $i; ?>);"><?php echo $i; ?></a></li>
						 				<?php }
						 			}
						 		}
						 	 ?>
						  	
							<?php if ($num_page < $total_page) { ?>
						  		<li><a href="javascript:;" onclick="tag_search(<?php echo $total_page; ?>);">&raquo;</a></li>
						  	<?php } ?>

						  	<form action="#" method="post" id="tag_form">
						  		<input type="hidden" name="search_txt" value="<?php echo $post_txt; ?>">
						  	</form>
						  	
						</ul>
					</div>

				<?php } else { ?>
					<!-- category search -->
					<div class="pagination_container
								col-lg-12">
						<ul class="pagination pagination-sm">
							
							<?php if ($num_page > 1){ ?>
						 		<li><a href="<?php echo base_url(); ?>header_search/<?php echo $search_key; ?>/<?php echo $search_txt; ?>/1">&laquo;</a></li>
						 	<?php } ?>
						 	<?php
						 		for ($i = (($num_page - $range) - 1); $i < (($num_page + $range) + 1) ; $i++) { 
						 			if (($i > 0) and ($i <= $total_page)) {
						 				if ($i == $num_page) { ?>
						 					<li class="active"><a href="javascript:;"><?php echo $num_page; ?></a></li>
						 				<?php } else { ?>
											<li><a href="<?php echo base_url(); ?>header_search/<?php echo $search_key; ?>/<?php echo $search_txt; ?>/<?php echo $i; ?>"><?php echo $i; ?></a></li>
						 				<?php }
						 			}
						 		}
						 	 ?>
						  	
							<?php if ($num_page < $total_page) { ?>
						  		<li><a href="<?php echo base_url(); ?>header_search/<?php echo $search_key; ?>/<?php echo $search_txt; ?>/<?php echo $total_page; ?>">&raquo;</a></li>
						  	<?php } ?>
						  	
						</ul>
					</div>
				<!-- End of pagination -->
				<?php } ?>
			</div>
		</div> 

		<script>var base_url = "<?php echo base_url(); ?>";</script>
		<script src="<?php echo base_url(); ?>assets/js/index.js"></script>
		<script src="https://code.jquery.com/jquery.js"></script>
		<script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>
