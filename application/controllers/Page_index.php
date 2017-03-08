<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(APPPATH."controllers/MY_Controller.php");

class Page_index extends MY_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->load->library('setsession');

	}

	public function output_list()
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

		$data['pagination'] = $this->pagination($total_rows, $per_page, $num_page, $args);

		// category 

		$this->load->Model('category');

		$data['category'] = $this->category->get_all();

		// 最新文章

		$row_out_num = 7; //取出最新文章筆數

		$this->load->Model('articles');

		$data['newest_article'] = $this->articles->get_newest($row_out_num);


		$this->load->view("desktop/index", $data);
		
	}

	public function list_pagination($num_page)
	{
		$data = array();

		$per_page = 9;

		$start_row = ($num_page - 1) * $per_page;

		$this->load->Model('articles');

		$all_article = $this->articles->get_all();

		$total_rows = count($all_article); 

		$total_pages = ceil($total_rows / $per_page); 

		$args = array("index");

		// 文章與分頁
		$data['articles'] = array_slice($all_article, $start_row, $per_page);

		$data['pagination'] = $this->pagination($total_rows, $per_page, $num_page, $args);

		// category 

		$this->load->Model('category');

		$data['category'] = $this->category->get_all();

		// 最新文章

		$row_out_num = 7; //取出最新文章筆數

		$this->load->Model('articles');

		$data['newest_article'] = $this->articles->get_newest($row_out_num);



		$this->load->view("desktop/index", $data);
	}


}
?>