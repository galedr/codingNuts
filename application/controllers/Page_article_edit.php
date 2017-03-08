<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page_article_edit extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->library('setsession');
	}

	public function set_route()
	{
		$data['admin'] = $_SESSION['codingNuts_admin'];

		$this->load->Model('category');

		$data['categories'] = $this->category->get_all();

		$this->load->view('desktop/new_article', $data);
	}

	public function tag_search()
	{
		$input_text = (empty($_POST['search_text'])) ? false : $_POST['search_text'];

		$this->load->Model('tag');

		$result = array();

		$data = $this->tag->search($input_text);

		foreach ($data as $key => $tag) {
			$result[] = "<span>".$tag['t_title']."</span>";
		}

		$result = implode("", $result);

		echo json_encode(array('status' => 'success', 'data' => $result));
	}

	public function make_new()
	{	
		$db_arr = array();
		$db_arr['a_title'] = $_POST['postTitle'];
		$db_arr['c_title'] = $_POST['insertClass'];
		$db_arr['a_intro'] = $_POST['a_intro'];
		$db_arr['a_content'] = $_POST['postContent'];
		$a_img_tmp = $_FILES['a_img']['tmp_name'];
		$a_img_name = $_FILES['a_img']['name'];
		move_uploaded_file($a_img_tmp, "assets/img/".$a_img_name);
		$db_arr['a_img'] = base_url()."assets/img/".$a_img_name;
		$db_arr['a_nickname'] = $_SESSION['codingNuts_admin']['a_nickname'];
		$db_arr['a_tag'] = $_POST['insertTag'];
		$db_arr['a_datetime'] = date('Y-m-d H:i:s');

		$this->load->Model('articles');
		$this->articles->make_new($db_arr);

		header("location:".base_url()."back_end");
	}

	public function update_route($a_id)
	{
		$this->load->Model('articles');
		$data['article'] = $this->articles->search_by_id($a_id);

		// 取出管理者資料

		$data['admin'] = $_SESSION['codingNuts_admin'];

		// 取出分類列表

		$this->load->Model('category');

		$data['categories'] = $this->category->get_all();

		$this->load->view('desktop/article_edit', $data);
	}

	public function make_update($a_id)
	{
		$db_arr = array();
		$db_arr['a_title'] = $_POST['postTitle'];
		$db_arr['c_title'] = $_POST['insertClass'];
		$db_arr['a_intro'] = $_POST['a_intro'];
		$db_arr['a_content'] = $_POST['postContent'];
		
		if (!empty($_FILES['a_img']['name'])) {
			$a_img_tmp = $_FILES['a_img']['tmp_name'];
			$a_img_name = $_FILES['a_img']['name'];
			move_uploaded_file($a_img_tmp, "assets/img/".$a_img_name);
			$db_arr['a_img'] = base_url()."assets/img/".$a_img_name;
		} else {
			$db_arr['a_img'] = $_POST['a_img_source'];
		}

		$db_arr['a_nickname'] = $_SESSION['codingNuts_admin']['a_nickname'];
		$db_arr['a_tag'] = $_POST['insertTag'];
		$db_arr['a_datetime'] = date('Y-m-d H:i:s');

		$this->load->Model('articles');
		$this->articles->do_update($db_arr, $a_id);

		header("location:".base_url()."back_end");

	}

}

?>