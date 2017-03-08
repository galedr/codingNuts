<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page_index extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->load->library('setsession');

		$this->load->helper('toolbox');
	}

	public function list()
	{	
		$data = array();

		$per_page = 9;

		$num_page = 1;

		$start_row = ($num_page - 1) * $per_page;

		$this->load->Model('articles');

		$json_file = file_get_contents("json_files/all_article.json");

		$all_article = json_decode($json_file, true);

		$total_rows = count($all_article); 

		$total_pages = ceil($total_rows / $per_page); 

		$args = array("index");

		// 文章與分頁
		$data['articles'] = array_slice($all_article, $start_row, $per_page);

		$data['pagination'] = pagination($total_rows, $per_page, $num_page, $args);

		// category 

		$this->load->Model('category');

		$data['category'] = $this->category->all_category();

		// 最新文章

		$row_out_num = 7; //取出最新文章筆數

		$this->load->Model('articles');

		$data['newest_article'] = $this->articles->newest_article($row_out_num);



		$this->load->view("desktop/index", $data);
		
	}
}
?>