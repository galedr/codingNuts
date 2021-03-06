<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>新增文章</title>
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/new_article.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/back_end_header.css">
		<script src="<?php echo base_url(); ?>assets/js/jquery-3.1.1.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/tools/tinymce/tinymce.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/new_article.js"></script>
	</head>
	<body>
		
		<?php $this->load->view('desktop/back_end_header'); ?>

		<form enctype="multipart/form-data" method="post" action="<?php echo base_url(); ?>back_end/add_article" id="article_form">
			<div class="insert_title
						col-lg-12">

				<div class="titleBar
							col-lg-8">
					<div class="input-group">
						<span class="input-group-addon" >文章</span>
						<input type="text" class="form-control" placeholder="請輸入文章標題" name="postTitle">
					</div>
				</div>

				<div class="controlArea
							col-lg-4">
					<div>
						<img src="<?php echo $admin['a_img']; ?>">
						<p>以 <?php echo $admin['a_nickname']; ?> 的身份張貼</p>
					</div>
					<button class="btn btn-default" id="submitPost" type="button" onclick="submit_check(this.form)">發佈</button>
				</div>

			</div>
			
			<div class="clearfix"></div>

			<div class="post_editor
						col-lg-12">
				<div class="edit_area
							col-lg-9">
					<textarea name="postContent" id="postContent" cols="30" rows="10"></textarea>
				</div>
				<div class="set_other
							col-lg-3">
							
					<ul class="list-group">
						<li class="list-group-item postClass">
							文章分類 : <span></span>
						</li>
						<li class="list-group-item postClass_set">
							<div class="input-group">
								<input type="text" class="form-control" placeholder="新增分類" name="insertClass">
								<span class="input-group-btn">
								<button class="btn btn-info" type="button" id="insertClass_submit">確認</button>
								</span>
							</div>
							<div class="set_already">
								<p>或從已有的分類中選取 ：</p>

								<!-- labrl for，label夾的文字，input的name，value 四者必須一樣 -->
								<?php foreach ($categories as $key => $uc) { ?>
									<label for="cate_<?php echo $uc['c_id']; ?>" style="cursor: pointer;">
										<?php echo $uc['c_title']; ?>
									</label>
									<input type="radio" name="usedClass" value="<?php echo $uc['c_title']; ?>" id="cate_<?php echo $uc['c_id']; ?>">
								<?php } ?>
								
							</div>
							
						</li>

						<li class="list-group-item postTag">
							關鍵字 ： <span id="postTag"></span>
						</li>
						<li class="list-group-item postTag_set">
							<div class="input-group">
								<input type="text" class="form-control" placeholder="關鍵字請間請用半形逗號,做區隔" name="insertTag" id="insertTag">
								<span class="input-group-btn">
								<button class="btn btn-info" type="button" id="insertTag_submit">確認</button>
								</span>
							</div>
							<div class="tag_already">
								<p>或是參考以下類似關鍵字 : </p>
								<div class="used_tag">
									<!-- <span>測試</span>
									<span>測試</span>
									<span>測試</span>
									<span>測試</span>
									<span>測試</span> -->
								</div>
							</div>
						</li>
						<li class="list-group-item postImg">
							選擇文章主要圖片 ： 
						</li>
						<li class="list-group-item img_input">
							<input type="file" name="a_img">
						</li>
						<li class="list-group-item img_preview">
							<img src="" id="img_preview">
						</li>
						
						<li class="list-group-item">
							文章簡介 ：
						</li>
						<li class="list-group-item">
							<textarea name="a_intro" cols="30" rows="5" class="form-control"></textarea>
						</li>

					</ul>

				</div>
			</div>
		</form>
		
		<script>var base_url = '<?php echo base_url(); ?>';</script>
		<script src="https://code.jquery.com/jquery.js"></script>
		<script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>

