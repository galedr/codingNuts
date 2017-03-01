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
							<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">選擇分類<b class="caret"></b></a>
							<ul class="dropdown-menu" id="article_class">
								<li><a href="<?php echo base_url(); ?>back_end">所有分類</a></li>
								<?php
									foreach ($article_category as $key => $value) {
								?>
											<li>
												<a href="<?php echo base_url(); ?>back_end_search/category/<?php echo $value['c_id']; ?>/1"><?php echo $value['c_title']; ?></a>
											</li>
								<?php } ?>
								<!-- <li><a href="#">test2</a></li>
								<li><a href="#">test3</a></li> -->
							</ul>
						</div>
					</div>

					<div class="search_article">
						<form method="post" action="<?php echo base_url(); ?>back_end_search/tag/none/1">
							<div class="input-group">
								<input type="text" class="form-control backEnd_search" placeholder="請輸入關鍵字" name="search_txt">
								<input type="hidden" name="search_key" value="tag">
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
					<p>第 <?php echo $now_page; ?> 頁，共 <?php echo $total_rows; ?> 頁</p>
					<ul class="pagination pagination-sm">
						<?php if ($num_page > 1) { ?>
							<li><a href="<?php echo base_url(); ?>back_end/1">&laquo;</a></li>
						<?php } ?>
						<?php 
							for ($i = (($num_page - $range) - 1); $i < (($num_page + $range) + 1); $i++) {

								if (($i > 0) and ($i <= $total_rows)) {
									
									if ($i == $num_page) { ?>
										
										<li class="active"><a href="javascript:;"><?php echo $i; ?></a></li>

									<?php } else { ?>
										<li><a href="<?php echo base_url(); ?>back_end/<?php echo $i; ?>"><?php echo $i; ?></a></li>

									<?php }
								}
							}
						?>
						<?php if ($num_page < $total_rows) { ?>
							<li><a href="<?php echo base_url(); ?>back_end/<?php echo $total_rows; ?>">&raquo;</a></li>
						<?php } ?>
					</ul>
				</div>
			</div>

			<!-- End of content_header -->

			<div class="content_content">
				<table class="table" id="content_table">
						
					<?php
						foreach ($article_row['article_data'] as $key => $value) {
					?>	

						<tr>
							<td class="article_title">
								<div>【<?php echo $value['c_title']; ?>】<?php echo $value['a_title']; ?></div>
								<div class="article_option">
									<a href="<?php echo base_url(); ?>article_edit/<?php echo $value['a_id']; ?>">編輯</a>/<a href="#">檢視</a>/<a href="<?php echo base_url(); ?>delete_article/<?php echo $value['a_id']; ?>">刪除</a>
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