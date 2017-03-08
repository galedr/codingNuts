<?php error_reporting(0); ?>
<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>管理後台</title>
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/back_end_index.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/back_end_header.css">
		<script src="<?php echo base_url(); ?>assets/js/jquery-3.1.1.min.js"></script>
	</head>
	<body>
		
		<?php $this->load->view('desktop/back_end_header'); ?>
		
		<div class="optionList_container
					col-lg-2">
			<ul class="list-group optionList">
				<li class="list-group-item">
					<img src="https://api.fnkr.net/testimg/20x20/00CED1/FFF/?text=img+placeholder">
					文章
				</li>

				<li class="list-group-item bindArticle">	全部 
					<?php 
						if ($num_all_article > 0) {
							echo "( ".$num_all_article." )";
						}
					?>
				</li>
				<li class="list-group-item bindArticle">	已發佈
					<?php 
						if ($num_posted_article > 0) {
							echo "( ".$num_posted_article." )";
						}
					?>
				</li>

				<li class="list-group-item">
					<img src="https://api.fnkr.net/testimg/20x20/00CED1/FFF/?text=img+placeholder">
					留言
				</li>
			</ul>
		</div>

		<div class="content
					col-lg-10">
			<div class="content_header">
				<div class="newArticle">
					<button class="btn btn-default" onclick="location.href='<?php echo base_url(); ?>back_end/new_article';">
						新文章
					</button>
				</div>
				<div class="search_control">
					<div class="selectClass">
						<div class="dropdown">
							<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">選擇分類<b class="caret"></b></a>
							<ul class="dropdown-menu" id="article_class">
								<li><a href="<?php echo base_url(); ?>back_end">所有分類</a></li>
								<?php
									foreach ($categories as $key => $cate) {
								?>
											<li>
												<a href="<?php echo base_url(); ?>back_end/category/1?s_key=category&s_val=<?php echo $cate['c_title']; ?>"><?php echo $cate['c_title']; ?></a>
											</li>
								<?php } ?>
								<!-- <li><a href="#">test2</a></li>
								<li><a href="#">test3</a></li> -->
							</ul>
						</div>
					</div>

					<div class="search_article">
						<form method="get" action="<?php echo base_url(); ?>back_end/tag/1">
							<div class="input-group">
								<input type="text" class="form-control backEnd_search" placeholder="請輸入關鍵字" name="s_val">
								<input type="hidden" name="s_key" value="tag">
						    	<span class="input-group-btn">
							    	<button class="btn btn-info" type="submit">
							    		搜尋
							    	</button>
							    </span>
							</div>
						</form>
					</div>
					
				</div>
			</div>
			
			<div class="article_pagination">
				<div class="pageStatus">
					<p>第 <?php echo $num_page; ?> 頁，共 <?php echo $total_pages; ?> 頁</p>
					<?php $this->load->view('desktop/pagination'); ?>
				</div>
			</div>

			<!-- End of content_header -->

			<div class="content_content">
				<table class="table" id="content_table">
						
					<?php
						foreach ($articles as $key => $arts) {
					?>	

						<tr>
							<td class="article_title">
								<div>【<?php echo $arts['c_title']; ?>】<?php echo $arts['a_title']; ?></div>
								<div class="article_option">
									<a href="<?php echo base_url(); ?>edit_article/<?php echo $arts['a_id']; ?>">編輯</a>/<a href="#">檢視</a>/<a href="<?php echo base_url(); ?>article_delete/<?php echo $arts['a_id']; ?>">刪除</a>
								</div>
							</td>
							<td class="draft">
								<span style="color:'red';">
									<?php
										if ($arts['a_status'] == '2') {
											echo "下架";
										}
									?>
								</span>
							</td>
							<td class="poster"><?php echo $arts['a_nickname']; ?></td>
							<td class="message_num">
								<img src="<?php echo base_url(); ?>assets/websiteImg/message.png">
								留言數
							</td>
							<td class="view_num">
								<img src="<?php echo base_url(); ?>assets/websiteImg/view.png">
								<?php echo $arts['a_checknum']; ?>
							</td>
							<td class="post_time"><?php echo $arts['a_datetime']; ?></td>
						</tr>
					
					<?php } ?>

				</table>
			</div>
			
		</div>
		
		<script>var base_url = "<?php echo base_url(); ?>";</script>
		<script src="<?php echo base_url(); ?>assets/js/back_end.js"></script>		
		<script src="https://code.jquery.com/jquery.js"></script>
		<script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>