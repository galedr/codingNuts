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

	public function search($num_page = 1)
	{
		$s_key = $_GET['s_key'];
		if (empty($_GET['s_val'])) {
			$data['error_message'] = "請輸入搜尋資料";
			$data['redirect'] = base_url();
			return;
		}
		$s_val = $_GET['s_val'];

		$data = array();

		$this->load->Model('articles');

		if ($s_key == 'category') {
			$result = $this->articles->search_by_category($s_val);
		} elseif ($s_key == 'tag') {
			$result = $this->articles->search_by_tag($s_val);
		}

		$per_page = 9;

		$total_rows = count($result);

		$total_pages = ceil($total_rows / $per_page);

		$args = array($s_key);

		$query = array("s_key" => $s_key, "s_val" => $s_val);

		$start_row = ($num_page - 1)*$per_page;

		$data['pagination'] = $this->pagination($total_rows, $per_page, $num_page, $args, $query);

		$data['articles'] = array_slice($result, $start_row, $per_page);

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