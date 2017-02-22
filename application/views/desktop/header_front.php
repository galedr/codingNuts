<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/index.css">
		<script src="<?php echo base_url(); ?>assets/js/jquery-3.1.1.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/header_front.js"></script>

		
	</head>
	<body>
		
		<div class="container header">
							
			<div class="logoHolder col-lg-12">
				<div class="logo
							col-lg-4 col-lg-offset-4">
					<a href="<?php echo base_url(); ?>"><img src="https://api.fnkr.net/testimg/400x80/00CED1/FFF/?text=Logo"></a>
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
						
						<input type="text" class="form-control" placeholder="請輸入關鍵字" name="search_txt">
						<input type="hidden" name="search_key" value="tag">
						<span class="input-group-btn" id="index_search">
					    	<button class="btn btn-info" type="button">搜尋</button>
						</span>
						
					</div>
				</div>			
			</div>
			<div class="classList_container
						col-lg-12">
				<ul class="classList">
				<?php  
					foreach ($category as $key => $cate) {

						if(!isset($search_txt)){ ?>

							<li><?php echo $cate['c_title']; ?></li>

					<?php } else {

							if ($cate['c_title'] == $search_txt) {	?>

								<li style="
									background-color: #FF8800;
									border: 1px solid #FF8800;
									color: white;">
									<?php echo $cate['c_title']; ?>	
								</li>
								
						<?php } else { ?>

								<li><?php echo $cate['c_title']; ?></li>

						<?php } ?>
					<?php } ?>
				<?php } ?>
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
