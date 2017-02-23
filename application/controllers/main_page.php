<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main_page extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct()
	{
		parent::__construct();

		$this->load->library('setsession');
	}

	public function index()
	{

		$this->load->Model('front_end_model');

		//文章row out

		$per_page = 9;

		$num_page = 1;

		$range = 2;
		$data['range'] = $range;

		if (isset($_GET['page'])) {
			$num_page = $_GET['page'];
		}
		$data['num_page'] = $num_page;

		$start_row = ($num_page - 1)*$per_page;

		$pagi_result = $this->front_end_model->article_row($start_row, $per_page);

		$data['num_rows'] = $pagi_result['num_rows'];
		$data['article_data'] = $pagi_result['article_data'];
		$data['total_page'] = ceil($pagi_result['num_rows']/$per_page);

		//分類 row out

		$data['category'] = $this->front_end_model->category_row();

		$this->load->view('desktop/header_front', $data);
		$this->load->view('desktop/index');
		$this->load->view('desktop/footer_front');
	}

	public function index_search()
	{
		// if get 關鍵字搜尋

		if (isset($_GET['search_key']) and ($_GET['search_key']) != "") {
			$search_key = $_GET['search_key'];
		}
		if (isset($_GET['search_txt']) and ($_GET['search_txt']) != "") {
			$search_txt = $_GET['search_txt'];
		}

		$per_page = 9;

		$num_page = 1;

		$range = 2;
		$data['range'] = $range;

		if (isset($_GET['page']) and ($_GET['page']) != "") {
			$num_page = $_GET['page'];
		}
		$data['num_page'] = $num_page;

		$start_row = ($num_page - 1)*$per_page;

		$this->load->Model('front_end_model');

		$pagi_result = $this->front_end_model->index_search($start_row, $per_page, $search_key, $search_txt);

		$data['num_rows'] = $pagi_result['num_rows'];

		$data['article_data'] = $pagi_result['article_data'];

		$data['total_page'] = ceil($pagi_result['num_rows']/$per_page);

		$data['search_key'] = $search_key;
		$data['search_txt'] = $search_txt;

		$data['category'] = $this->front_end_model->category_row();

		$this->load->view('desktop/header_front', $data);
		$this->load->view('desktop/index_search');
		$this->load->view('desktop/footer_front');
			
	}

	public function articles($a_id)
	{
		$this->load->Model('front_end_model');

		$data['category'] = $this->front_end_model->category_row();

		$result = $this->front_end_model->article($a_id);

		$data['article'] = $result;

		//取出相關文章

		$data['recommand'] = $this->front_end_model->recommand_article($result[0]['c_title'], $a_id);


		$this->load->view('desktop/header_front', $data);
		$this->load->view('desktop/articles');
		$this->load->view('desktop/footer_front');
	}

}