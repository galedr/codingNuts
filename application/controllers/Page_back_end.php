<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(APPPATH."controllers/MY_Controller.php");

class Page_back_end extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();

		ob_start();

		$this->load->library('setsession');
	}

	public function admin_login_page()
	{
		$this->load->view('desktop/admin_login');
	}

	public function admin_login()
	{
		$admin_account = (empty($_POST['adminAccount'])) ? false : $_POST['adminAccount'];
		$admin_password = (empty($_POST['adminPassword'])) ? false : $_POST['adminPassword'];

		if ($admin_account == false or $admin_password == false) {
			$data['error_message'] = "您的帳號與密碼皆不能為空白";
			$data['redirect'] = base_url()."back_end/admin_login";

			$this->load->view('desktop/error_page', $data);
			return;
		}

		$this->load->Model('admin');

		$result = $this->admin->check($admin_account, $admin_password);

		if (count($result) == 0) {
			$data['error_message'] = "您的帳號或密碼有誤";
			$data['redirect'] = base_url()."back_end/admin_login";

			$this->load->view('desktop/error_page', $data);
			return;
		}

		$session_key = "codingNuts_admin";
		
		$this->setsession->admin_set($session_key, $result);

		header("location:".base_url()."back_end");
	}

	public function admin_logout()
	{
		$this->setsession->admin_unset();
		header("location:".base_url());
	}

	public function output_list()
	{
		$data = array();

		$this->load->Model('articles');

		$all_article = $this->articles->get_all();	

		$per_page = 10;

		$num_page = 1;

		$start_row = ($num_page - 1)*$per_page;

		$total_rows = count($all_article);

		$total_pages = ceil($total_rows/$per_page);

		$args = array('back_end');

		// 文章與分頁

		$data['num_page'] = $num_page;

		$data['total_pages'] = $total_pages;

		$data['articles'] = array_slice($all_article, $start_row, $per_page);

		$data['pagination'] = $this->pagination($total_rows, $per_page, $num_page, $args);

		// 全部文章 and 已發佈文章數量

		$data['num_all_article'] = $total_rows;
		$posted_count = 0;
		foreach ($data['articles'] as $key => $val) {
			if ($val['a_status'] == 1) {
				$posted_count += 1;
			}
		}
		$data['num_posted_article'] = $posted_count;

		// 取出分類列表

		$this->load->Model('category');

		$data['categories'] = $this->category->get_all();

		// 取出管理者資料

		$data['admin'] = $_SESSION['codingNuts_admin'];


		$this->load->view('desktop/back_end_index', $data);
	}

	public function list_pagination($num_page)
	{
		$data = array();

		$this->load->Model('articles');

		$all_article = $this->articles->get_all();	

		$per_page = 10;

		$start_row = ($num_page - 1)*$per_page;

		$total_rows = count($all_article);

		$total_pages = ceil($total_rows/$per_page);

		$args = array('back_end');

		// 文章與分頁

		$data['num_page'] = $num_page;

		$data['total_pages'] = $total_pages;

		$data['articles'] = array_slice($all_article, $start_row, $per_page);

		$data['pagination'] = $this->pagination($total_rows, $per_page, $num_page, $args);

		// 全部文章 and 已發佈文章數量

		$data['num_all_article'] = $total_rows;
		$posted_count = 0;
		foreach ($data['articles'] as $key => $val) {
			if ($val['a_status'] == 1) {
				$posted_count += 1;
			}
		}
		$data['num_posted_article'] = $posted_count;

		// 取出分類列表

		$this->load->Model('category');

		$data['categories'] = $this->category->get_all();

		// 取出管理者資料

		$data['admin'] = $_SESSION['codingNuts_admin'];


		$this->load->view('desktop/back_end_index', $data);
	}

	public function search($num_page = 1)
	{
		$s_key = $_GET['s_key'];
		if (empty($_GET['s_val'])) {
			$data['error_message'] = "請輸入查詢關鍵字";
			$data['redirect'] = base_url()."back_end";
			$this->load->view('desktop/error_page', $data);
			return;
		}
		$s_val = $_GET['s_val'];

		$data = array();

		$this->load->Model('articles');

		if ($s_key == 'category') {
			$all_article = $this->articles->search_by_category($s_val);
		} elseif ($s_key == 'tag') {
			$all_article = $this->articles->search_by_tag($s_val);
		}

		$per_page = 10;

		$start_row = ($num_page - 1)*$per_page;

		$total_rows = count($all_article);

		$total_pages = ceil($total_rows/$per_page);

		$args = array('back_end','search');

		$query = array('s_key' => $s_key, 's_val' => $s_val);

		$data['num_page'] = $num_page;

		$data['total_pages'] = $total_pages;

		$data['articles'] = array_slice($all_article, $start_row, $per_page);

		$data['pagination'] = $this->pagination($total_rows, $per_page, $num_page, $args, $query);

		// 全部文章 and 已發佈文章數量

		$data['num_all_article'] = $total_rows;
		$posted_count = 0;
		foreach ($data['articles'] as $key => $val) {
			if ($val['a_status'] == 1) {
				$posted_count += 1;
			}
		}
		$data['num_posted_article'] = $posted_count;

		// 取出分類列表

		$this->load->Model('category');

		$data['categories'] = $this->category->get_all();

		// 取出管理者資料

		$data['admin'] = $_SESSION['codingNuts_admin'];

		$this->load->view('desktop/back_end_index', $data);	

	}

}

?>