

<ul class="pagination pagination-sm">
<?php if ($pagination->get_prev_page()) { ?>
	<li><a href="<?php echo $pagination->get_prev_url(); ?>">&laquo;</a></li>
<?php } ?>

<?php 
	$pages = $pagination->show_page_num(3);
	foreach ($pages as $key => $page_num) {
		if ($pagination->num_page == $page_num) { ?>
			<li class="active"><a href="javascript:;"><?php echo $page_num; ?></a></li>
<?php } else { ?>
			<li><a href="<?php echo $pagination->get_cur_url($page_num); ?>"><?php echo $page_num; ?></a></li>	
<?php }
	}
?>

 <?php if ($pagination->get_next_page()) { ?>
 	<li><a href="<?php echo $pagination->get_next_url(); ?>">&raquo;</a></li>
 <?php } ?>
</ul>


