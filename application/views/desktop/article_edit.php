<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>修改文章</title>
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/article_edit.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/back_end_header.css">
		<script src="<?php echo base_url(); ?>assets/js/jquery-3.1.1.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/tools/ckfinder/ckfinder.js"></script>
		<script src="<?php echo base_url(); ?>assets/tools/ckeditor/ckeditor.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/article_edit.js"></script>
	</head>
	<body>
		<form enctype="multipart/form-data" method="post" action="<?php echo base_url(); ?>article_update/<?php echo $article_data[0]['a_id']; ?>" id="article_form">
			<div class="insert_title
						col-lg-12">

				<div class="titleBar
							col-lg-8">
					<div class="input-group">
						<span class="input-group-addon" >文章</span>
						<input type="text" class="form-control" name="postTitle" value="<?php echo $article_data[0]['a_title']; ?>">
						<input type="hidden" name="a_id" value="<?php echo $article_data[0]['a_id']; ?>">
					</div>
				</div>

				<div class="controlArea
							col-lg-4">
					<div>
						<img src="<?php echo $admin[0]['a_img']; ?>">
						<p>以 <?php echo $admin[0]['a_nickname']; ?> 的身份張貼</p>
					</div>
					<button class="btn btn-default" id="submitPost" type="submit">發佈</button>
				</div>

			</div>
			
			<div class="clearfix"></div>

			<div class="post_editor
						col-lg-12">
				<div class="edit_area
							col-lg-9">
					<textarea name="postContent" id="postContent" cols="30" rows="10"><?php echo $article_data[0]['a_content']; ?></textarea>
				</div>
				<div class="set_other
							col-lg-3">
							
					<ul class="list-group">
						<li class="list-group-item postClass">
							文章分類 : <span><?php echo $article_data[0]['c_title']; ?></span>
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

								<label for="class01">這是</label>
								<input type="radio" name="usedClass" value="class01" id="class01">
								<label for="class02">這是</label>
								<input type="radio" name="usedClass" value="class02" id="class02">
								<label for="class03">這是</label>
								<input type="radio" name="usedClass" value="class03" id="class03">
								<label for="class04">這是</label>
								<input type="radio" name="usedClass" value="class04" id="class04">
								<label for="class111105">這是</label>
								<input type="radio" name="usedClass" value="class111105" id="class111105">
								<div class="set_btn_control">
									<button class="btn btn-info" id="setClass_submit">確認</button>
								</div>
							</div>
							
						</li>

						<li class="list-group-item postTag">
							關鍵字 ： <span id="postTag"><?php echo $article_data[0]['a_tag']; ?></span>
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
							<img src="<?php echo $article_data[0]['a_img']; ?>" id="img_preview">
							<input type="hidden" name="a_img_source" value="<?php echo $article_data[0]['a_img']; ?>">
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
