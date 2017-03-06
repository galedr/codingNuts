<?php

function pagination($total_rows, $per_page, $num_page, $args = array(), $query = null)
{
	require_once(APPPATH."libraries/page.php");

	$pagination = new Page($total_rows, $per_page, $num_page, $args);

	if (!empty($query)) {
		$pagination->set_url_param($query);
	}

	return $pagination;
}








?>