<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller 
{	
	public function __construct()
	{
		parent::__construct();
	}

	public function pagination($total_rows, $per_page, $num_page, $args = array(), $query = null)
	{
		require_once(APPPATH."libraries/page.php");

		$pagination = new Page($total_rows, $per_page, $num_page, $args);

		if (!empty($query)) {
			$pagination->set_url_param($query);
		}

		return $pagination;
	}
}
?>