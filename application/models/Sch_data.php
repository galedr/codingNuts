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

}

?>