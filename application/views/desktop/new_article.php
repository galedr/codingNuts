<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>新增文章</title>
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/new_article.css">
		<script src="<?php echo base_url(); ?>assets/js/jquery-3.1.1.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/tools/ckfinder/ckfinder.js"></script>
		<script src="<?php echo base_url(); ?>assets/tools/ckeditor/ckeditor.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/new_article.js"></script>
	</head>
	<body>
				
		<div class="header">
			<div class="logo">
				<img src="https://api.fnkr.net/testimg/200x40/00CED1/FFF/?text=img+placeholder">
			</div>
			<div>
				<p>nowAction</p>
			</div>
			<div class="adminStatus">
				<p>Welcome, <?php echo $admin[0]['a_nickname']; ?></p>
				<p><a href="#">登出</a></p>
				<img src="<?php echo $admin[0]['a_img']; ?>">
			</div>
		</div>

		<!-- End of header -->

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
					<img src="<?php echo $admin[0]['a_img']; ?>">
					<p>以 <?php echo $admin[0]['a_nickname']; ?> 的身份張貼</p>
				</div>
				<button class="btn btn-default" id="submitPost">發佈</button>
				<button class="btn btn-default">預覽</button>
				<button class="btn btn-default">關閉</button>
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

					<!-- <li class="list-group-item postDate">
						發佈時間 : <span id="postTime"></span>
					</li>
					<li class="list-group-item set_postDate">
						<div>
							<input type="radio" name="setDate" id="postNow" value="now">
							<label for="postNow">現在</label>
						</div>
						<div>
							<input type="radio" name="setDate" id="setDate" value="choose">
							<label for="setDate">設定時間</label>
						</div>	
						<div class="chooseDate">
							<input type="time" name="postDate">
						</div>
						<div>
							<button class="btn btn-info setDate_submit">確認</button>
						</div>
					</li> -->
				</ul>

			</div>
		</div>

		
		<script>var base_url = '<?php echo base_url(); ?>';</script>
		<script src="https://code.jquery.com/jquery.js"></script>
		<script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>
