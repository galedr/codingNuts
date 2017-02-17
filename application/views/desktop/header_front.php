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
		
		<div class="container header">
							
			<div class="logoHolder col-lg-12">
				<div class="logo
							col-lg-4 col-lg-offset-4">
					<img src="https://api.fnkr.net/testimg/400x80/00CED1/FFF/?text=Logo">
				</div>
			</div>

			<div class="introList
						col-lg-12">
				<div class="col-lg-4 col-lg-offset-4">
					<p>&#8853 <a href="#">About</a></p>
					<p>&#8853 <a href="#">Article List</a></p>
				</div>
			</div>

			<div class="searchBar_container
						col-lg-12">
				<div class="col-lg-4 col-lg-offset-4">
					<div class="input-group searchBar">
						<input type="text" class="form-control" placeholder="請輸入關鍵字">
						<span class="input-group-btn">
					    	<button class="btn btn-info" id="indexSearch" type="button">搜尋</button>
						</span>
					</div>
				</div>			
			</div>
			<div class="classList_container
						col-lg-12">
				<ul class="classList">
					<li>1</li>
					<li>2</li>
					<li>3</li>
					<li>4</li>
					<li>5</li>
					<li>6</li>
				</ul>
			</div>
			
		</div>
		<!-- ENd of header -->

		<script>var base_url = "<?php echo base_url(); ?>";</script>
		<script src="<?php echo base_url(); ?>assets/js/index.js"></script>
		<script src="https://code.jquery.com/jquery.js"></script>
		<script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>
