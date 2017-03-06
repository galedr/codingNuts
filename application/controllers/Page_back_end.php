<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Page_back_end extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		ob_start();

		$this->load->library('setsession');
	}

	// 管理員登入登出

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

		$result = $this->admin->admin_check($admin_account, $admin_password);

		if (count($result) == 0) {
			$data['error_message'] = "您的帳號或密碼有誤";
			$data['redirect'] = base_url()."back_end/admin_login";

			$this->load->view('desktop/error_page', $data);
			return;
		}

		$session_key = "codingNuts_admin";

		$this->setsession->admin_set($session_key, $admin_account);

		header("location:".base_url()."back_end");

	}

	public function admin_logout()
	{
		$this->setsession->admin_unset();

		header("location:".base_url());
	}

	// 後台首頁

	public function back_end_index()
	{
		$data = array();

		$this->load->Model('articles');

		$all_article = $this->articles->all_articles();	

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

		$data['pagination'] = pagination($total_rows, $per_page, $num_page, $args);

		// 全部文章 and 已發佈文章數量

		$data['num_all_article'] = $total_rows;

		$data['num_posted_article'] = count($this->articles->posted_article());

		// 取出分類列表

		$this->load->Model('category');

		$data['categories'] = $this->category->all_category();

		// 取出管理者資料

		if (isset($_SESSION['codingNuts_admin'])) {
			$admin_account = $_SESSION['codingNuts_admin'];
			$this->load->Model('admin');
			$data['admin'] = $this->admin->admin_data($admin_account);
		}

		$this->load->view('desktop/back_end_index', $data);

	}

	public function back_end_index_pagi($num_page)
	{
		$data = array();

		$this->load->Model('articles');

		$all_article = $this->articles->all_articles();	

		$per_page = 10;

		$start_row = ($num_page - 1)*$per_page;

		$total_rows = count($all_article);

		$total_pages = ceil($total_rows/$per_page);

		$args = array('back_end');

		// 文章與分頁

		$data['num_page'] = $num_page;

		$data['total_pages'] = $total_pages;

		$data['articles'] = array_slice($all_article, $start_row, $per_page);

		$data['pagination'] = pagination($total_rows, $per_page, $num_page, $args);

		// 全部文章 and 已發佈文章數量

		$data['num_all_article'] = $total_rows;

		$data['num_posted_article'] = count($this->articles->posted_article());

		// 取出分類列表

		$this->load->Model('category');

		$data['categories'] = $this->category->all_category();

		// 取出管理者資料

		if (isset($_SESSION['codingNuts_admin'])) {
			$admin_account = $_SESSION['codingNuts_admin'];
			$this->load->Model('admin');
			$data['admin'] = $this->admin->admin_data($admin_account);
		}

		$this->load->view('desktop/back_end_index', $data);
	}

	public function back_end_search($num_page = 1)
	{
		$s_key = (empty($_GET['s_key'])) ? false : $_GET['s_key'];
		$s_val = (empty($_GET['s_val'])) ? false : $_GET['s_val'];

		$data = array();

		$this->load->Model('articles');

		if ($s_key == 'category') {
			$all_article = $this->articles->article_search_category($s_val);	
		} elseif ($s_key == 'tag') {
			$all_article = $this->articles->article_search_tag($s_val);
		}	

		$per_page = 10;

		$start_row = ($num_page - 1)*$per_page;

		$total_rows = count($all_article);

		$total_pages = ceil($total_rows/$per_page);

		$args = array('back_end','search');

		$query = array('s_key' => $s_key, 's_val' => $s_val);

		// 文章與分頁

		$data['num_page'] = $num_page;

		$data['total_pages'] = $total_pages;

		$data['articles'] = array_slice($all_article, $start_row, $per_page);

		$data['pagination'] = pagination($total_rows, $per_page, $num_page, $args, $query);

		// 取出分類列表

		$this->load->Model('category');

		$data['categories'] = $this->category->all_category();

		// 全部文章 and 已發佈文章數量

		$data['num_all_article'] = $total_rows;

		$data['num_posted_article'] = count($this->articles->posted_article());

		// 取出管理者資料

		if (isset($_SESSION['codingNuts_admin'])) {
			$admin_account = $_SESSION['codingNuts_admin'];
			$this->load->Model('admin');
			$data['admin'] = $this->admin->admin_data($admin_account);
		}

		$this->load->view('desktop/back_end_index', $data);

	}

	public function new_article()
	{	
		// 取出管理者資料

		if (isset($_SESSION['codingNuts_admin'])) {
			$admin_account = $_SESSION['codingNuts_admin'];
			$this->load->Model('admin');
			$data['admin'] = $this->admin->admin_data($admin_account);
		}

		// 取出分類列表

		$this->load->Model('category');

		$data['categories'] = $this->category->all_category();

		$this->load->view('desktop/new_article', $data);
	}

	public function tag_search()
	{
		$input_text = (empty($_POST['search_text'])) ? false : $_POST['search_text'];

		$this->load->Model('tag');

		$result = array();

		$data = $this->tag->tag_search($input_text);

		foreach ($data as $key => $tag) {
			$result[] = "<span>".$tag['t_title']."</span>";
		}

		$result = implode("", $result);

		echo json_encode(array('status' => 'success', 'data' => $result));
	}

	public function add_article()
	{
		$a_title = (empty($_POST['postTitle'])) ? false : $_POST['postTitle'];
		$c_title = (empty($_POST['insertClass'])) ? false : $_POST['insertClass'];
		$a_content = (empty($_POST['postContent'])) ? false : $_POST['postContent'];
		$a_intro = (empty($_POST['a_intro'])) ? false : $_POST['a_intro'];
		$a_datetime = date('Y-m-d H:i:s');
		$this->load->Model('admin');
		$a_nickname = $this->admin->admin_data($_SESSION['codingNuts_admin']);
		$a_nickname = $a_nickname[0]['a_nickname'];
		$a_tag = (empty($_POST['insertTag'])) ? false : $_POST['insertTag'];

		$a_img_name = $_FILES['a_img']['name'];
		$a_img_tmp = $_FILES['a_img']['tmp_name'];
		move_uploaded_file($a_img_tmp, "assets/img/".$a_img_name);
		$a_img = base_url()."assets/img/".$a_img_name;

		// 寫入article table
		$this->load->Model('articles');
		$this->articles->add_article($a_title, $c_title, $a_intro, $a_content, $a_img, $a_nickname, $a_tag, $a_datetime);

		header('location:'.base_url()."back_end");
	}

	public function edit_article_page($a_id)
	{
		$this->load->Model('articles');
		$data['article'] = $this->articles->article_data($a_id);

		// 取出管理者資料

		if (isset($_SESSION['codingNuts_admin'])) {
			$admin_account = $_SESSION['codingNuts_admin'];
			$this->load->Model('admin');
			$data['admin'] = $this->admin->admin_data($admin_account);
		}

		// 取出分類列表

		$this->load->Model('category');

		$data['categories'] = $this->category->all_category();

		$this->load->view('desktop/article_edit', $data);
	}

	public function edit_article_update($a_id)
	{
		$a_title = (empty($_POST['postTitle'])) ? false : $_POST['postTitle'];
		$c_title = (empty($_POST['insertClass'])) ? false : $_POST['insertClass'];
		$a_content = (empty($_POST['postContent'])) ? false : $_POST['postContent'];
		$a_intro = (empty($_POST['a_intro'])) ? false : $_POST['a_intro'];
		$a_datetime = date('Y-m-d H:i:s');
		$this->load->Model('admin');
		$a_nickname = $this->admin->admin_data($_SESSION['codingNuts_admin']);
		$a_nickname = $a_nickname[0]['a_nickname'];
		$a_tag = (empty($_POST['insertTag'])) ? false : $_POST['insertTag'];

		$a_img_name = $_FILES['a_img']['name'];
		$a_img_tmp = $_FILES['a_img']['tmp_name'];
		move_uploaded_file($a_img_tmp, "assets/img/".$a_img_name);
		$a_img = base_url()."assets/img/".$a_img_name;

		// 寫入article table
		$this->load->Model('articles');
		$this->articles->update_article($a_id, $a_title, $c_title, $a_intro, $a_content, $a_img, $a_nickname, $a_tag, $a_datetime);
		
		header('location:'.base_url()."back_end");
	}

	public function article_delete($a_id)
	{
		$this->load->Model('articles');
		$this->articles->article_delete($a_id);

		header("location:".base_url()."back_end");
	}

}



?>