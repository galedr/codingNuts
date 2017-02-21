<?php ini_set("display_errors", "On"); ?>
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
				
		<div class="optionList_container
					col-lg-2">
			<ul class="list-group optionList">
				<li class="list-group-item">
					<img src="https://api.fnkr.net/testimg/20x20/00CED1/FFF/?text=img+placeholder">
					文章
				</li>

				<li class="list-group-item bindArticle">	全部 
					<?php 
						if ($article_num['total_num'] > 0) {
							echo "( ".$article_num['total_num']." )";
						}
					?>
				</li>
				<li class="list-group-item bindArticle">	草稿
					<?php 
						if ($article_num['draft_num'] > 0) {
							echo "( ".$article_num['draft_num']." )";
						}
					?>
				</li>
				<li class="list-group-item bindArticle">	已發佈
					<?php 
						if ($article_num['posted_num'] > 0) {
							echo "( ".$article_num['posted_num']." )";
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
					<button class="btn btn-default" onclick="location.href='<?php echo base_url(); ?>new_article';">
						新文章
					</button>
				</div>
				<div class="search_control">
					<div class="selectClass">
						<div class="dropdown">
							<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">所有分類<b class="caret"></b></a>
							<ul class="dropdown-menu" id="article_class">
								<?php
									foreach ($article_category as $key => $value) {
										foreach ($value as $key => $value) {
								?>
											<li>
												<a href="<?php echo base_url(); ?>back_end_search?search_key=category&search_txt=<?php echo $value; ?>"><?php echo $value; ?></a>
											</li>
								<?php } } ?>
								<!-- <li><a href="#">test2</a></li>
								<li><a href="#">test3</a></li> -->
							</ul>
						</div>
					</div>
					<div class="search_article">
						<div class="input-group">
							<input type="text" class="form-control backEnd_search" placeholder="請輸入關鍵字">
					    	<span class="input-group-btn">
						    	<button class="btn btn-info" type="button">
						    		搜尋
						    	</button>
						    </span>
						</div>
					</div>
				</div>
			</div>
			
			<div class="article_pagination">
				<div class="pageStatus">
					<p>第 <?php echo $num_page; ?> 頁，共 <?php echo $total_page; ?> 頁</p>
					<ul class="pagination pagination-sm">
						<?php if ($num_page > 1) { ?>
							<li><a href="<?php echo base_url(); ?>back_end_search?searchKey=<?php echo $search_key; ?>&search_txt=<?php echo $search_txt; ?>&num_page=1">&laquo;</a></li>
						<?php } ?>
						<?php 
							for ($i = (($num_page - $range) - 1); $i < (($num_page + $range) + 1); $i++) {

								if (($i > 0) and ($i <= $total_page)) {
									
									if ($i == $num_page) { ?>
										
										<li class="active"><a href="javascript:;"><?php echo $i; ?></a></li>

									<?php } else { ?>
										<li><a href="<?php echo base_url(); ?>back_end_search?search_key=<?php echo $search_key; ?>&search_txt=<?php echo $search_txt; ?>&num_page=<?php echo $i; ?>"><?php echo $i; ?></a></li>

									<?php }
								}
							}
						?>
						<?php if ($num_page < $total_page) { ?>
							<li><a href="<?php echo base_url(); ?>back_end_search?search_key=<?php echo $search_key; ?>&search_txt=<?php echo $search_txt; ?>&num_page=<?php echo $total_page; ?>">&raquo;</a></li>
						<?php } ?>
						
					</ul>
				</div>
			</div>

			<!-- End of content_header -->

			<div class="content_content">
				<table class="table" id="content_table">
						
					<?php
						foreach ($article_data as $key => $value) {
					?>	

						<tr>
							<td class="article_title">
								<div>【<?php echo $value['c_title']; ?>】<?php echo $value['a_title']; ?></div>
								<div class="article_option">
									<a href="#">編輯</a>/<a href="#">檢視</a>/<a href="<?php echo base_url(); ?>delete_article/<?php echo $value['a_id']; ?>">刪除</a>
								</div>
							</td>
							<td class="draft">
								<span style="color:'red';">
									<?php
										if ($value['a_status'] == '2') {
											echo "下架";
										}
									?>
								</span>
							</td>
							<td class="poster"><?php echo $value['a_nickname']; ?></td>
							<td class="message_num">
								<img src="<?php echo base_url(); ?>assets/websiteImg/message.png">
								留言數
							</td>
							<td class="view_num">
								<img src="<?php echo base_url(); ?>assets/websiteImg/view.png">
								瀏覽數
							</td>
							<td class="post_time"><?php echo $value['a_datetime']; ?></td>
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