<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>首頁-文章列表</title>
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
				
				<div class="data_container
							col-lg-4">
					<div class="data">
						<h2>Title</h2>
						<div class="time_class">
							<p>2016-02-09</p>
							<p>class</p>
						</div>
						<div class="img">
							<img src="https://api.fnkr.net/testimg/350x200/00CED1/FFF/?text=img+placeholder">
						</div>
						<div class="info">
							test<br>
							test<br>
							test<br>
							test<br>
						</div>
					</div>
				</div>

				<div class="data_container
							col-lg-4">
					<div class="data">
						<h2>Title</h2>
						<div class="time_class">
							<p>2016-02-09</p>
							<p>class</p>
						</div>
						<div class="img">
							<img src="https://api.fnkr.net/testimg/350x200/00CED1/FFF/?text=img+placeholder">
						</div>
						<div class="info">
							test<br>
							test<br>
							test<br>
							test<br>
						</div>
					</div>
				</div>

				<div class="data_container
							col-lg-4">
					<div class="data">
						<h2>Title</h2>
						<div class="time_class">
							<p>2016-02-09</p>
							<p>class</p>
						</div>
						<div class="img">
							<img src="https://api.fnkr.net/testimg/350x200/00CED1/FFF/?text=img+placeholder">
						</div>
						<div class="info">
							test<br>
							test<br>
							test<br>
							test<br>
						</div>
					</div>
				</div>

				<div class="data_container
							col-lg-4">
					<div class="data">
						<h2>Title</h2>
						<div class="time_class">
							<p>2016-02-09</p>
							<p>class</p>
						</div>
						<div class="img">
							<img src="https://api.fnkr.net/testimg/350x200/00CED1/FFF/?text=img+placeholder">
						</div>
						<div class="info">
							test<br>
							test<br>
							test<br>
							test<br>
						</div>
					</div>
				</div>

				<!-- 分頁 -->
				
				<div class="pagination_container
							col-lg-12">
					<ul class="pagination pagination-sm">
					 	<li><a href="#">&laquo;</a></li>
					  	<li><a href="#">1</a></li>
					  	<li><a href="#">2</a></li>
					 	<li class="active"><a href="#">3</a></li>
					  	<li><a href="#">4</a></li>
					  	<li><a href="#">5</a></li>
					  	<li><a href="#">&raquo;</a></li>
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
		<?php var_dump($article_data); ?>

		<script>var base_url = "<?php echo base_url(); ?>";</script>
		<script src="<?php echo base_url(); ?>assets/js/index.js"></script>
		<script src="https://code.jquery.com/jquery.js"></script>
		<script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>
