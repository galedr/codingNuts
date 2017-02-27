<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pull_data extends CI_Controller {


	public function __construct()
	{

		parent::__construct();

	}

	public function all_article()
	{	
		$this->load->Model('pull_data_model');
		
		$result = $this->pull_data_model->all_article();

		$data = json_encode($result);

		file_put_contents("json_files/all_article.json", $data);
	}

	public function reset_category_article()
	{
		$this->load->Model('pull_data_model');

		$article_data = $this->pull_data_model->reset_category_article();

		//重新將文章分類寫入category資料表，重置category資料表

		foreach ($article_data as $key => $article) {
			$this->db->query("INSERT INTO category (c_title) VALUES ('".$article['c_title']."')");
		}

		$this->db->query("CREATE TABLE cate_tmp AS SELECT DISTINCT c_title FROM category");
		$this->db->query("TRUNCATE TABLE category");
		$this->db->query("INSERT INTO category (c_title) SELECT c_title FROM cate_tmp");
		$this->db->query("DROP TABLE cate_tmp");
		
		//重置article_category雙關聯資料表

		foreach ($article_data as $key => $article) {
			
			$c_id = $this->pull_data_model->category_id($article['c_title']);
			
			$this->db->query("INSERT INTO article_category (a_id,c_id) VALUES ('".$article['a_id']."','".$c_id[0]['c_id']."')");

		}

		$this->db->query("CREATE TABLE ac_tmp AS SELECT DISTINCT c_id,a_id FROM article_category");
		$this->db->query("TRUNCATE TABLE article_category");
		$this->db->query("INSERT INTO article_category (c_id,a_id) SELECT c_id,a_id FROM ac_tmp");
		$this->db->query("DROP TABLE ac_tmp");

	}


}