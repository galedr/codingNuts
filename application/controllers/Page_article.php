<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Page_article extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function articles($a_id)
	{
		$this->load->Model('articles');
		$data['article'] = $this->articles->article_data($a_id);

		// 推薦文章，同分類別

		$recommand_key = $data['article'][0]['c_title'];
		$data['recommand'] = $this->articles->article_data_category($recommand_key);

		$this->load->view('desktop/articles', $data);
	}


}




?>