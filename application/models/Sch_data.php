<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sch_data extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function get_articles()
	{	
		$this->load->Model('articles');
		$result = $this->articles->get_all();
		$data = json_encode($result);

		file_put_contents("json_files/all_article.json", $data);
	}

	public function set_category()
	{
		$this->load->Model('articles');
		$result = $this->articles->get_all();
		$categories = array();

		foreach ($result as $key => $cate) {
			$categories[] = $cate['c_title']; 
		}

		$categories = array_unique($categories);

		$this->load->Model('category');
		$this->category->reset($categories);
	}

	public function set_article_category()
	{
		$this->load->Model('articles');
		$this->load->Model('category');
		$articles = $this->articles->get_all();
		$c_id = "";
		$ac = array();
		foreach ($articles as $key => $art) {
			$cate = $this->category->search_by_title($art['c_title']);
			$c_id = $cate[0]['c_id'];
			$ac[] = array('a_id' => $art['a_id'], 'c_id' => $c_id); 	
		}

		$this->category->reset_ac($ac);	
	}

}

?>