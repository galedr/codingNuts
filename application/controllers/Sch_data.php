<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sch_data extends CI_Controller {


	public function __construct()
	{

		parent::__construct();

	}

	public function all_articles()
	{	
		$this->load->Model('articles');
		$result = $this->articles->all_articles();
		$data = json_encode($result);

		file_put_contents("json_files/all_article.json", $data);
	}

	public function set_category()
	{
		$this->load->Model('articles');
		$result = $this->articles->all_articles();
		$categories = array();

		foreach ($result as $key => $cate) {
			$categories[] = $cate['c_title']; 
		}

		$categories = array_unique($categories);

		$this->load->Model('category');
		$this->category->set_category($categories);
	}

	public function set_article_category()
	{
		$this->load->Model('articles');
		$this->load->Model('category');
		$articles = $this->articles->all_articles();
		$c_id = "";
		$ac = array();
		foreach ($articles as $key => $art) {
			$cate = $this->category->category_data_title($art['c_title']);
			$c_id = $cate[0]['c_id'];
			$ac[] = array('a_id' => $art['a_id'], 'c_id' => $c_id); 	
		}

		$this->category->set_article_category($ac);		

	}

	public function set_tag()
	{
		$this->load->Model('articles');
		$this->load->Model('tag');
		$articles = $this->articles->all_articles();
		$t_title = array();
		foreach ($articles as $key => $tag_str) {
			$tag = explode(",", $tag_str['a_tag']);
			foreach ($tag as $key => $title) {
				$t_title[] = $title;
			}
		}

		$t_title = array_unique($t_title);
		$this->tag->set_tag($t_title);

	}

	public function set_article_tag()
	{
		$this->load->Model('articles');
		$this->load->Model('tag');
		$articles = $this->articles->all_articles();
		$at = array();
		foreach ($articles as $key => $a_id) {
			$tags = explode(",", $a_id['a_tag']);
			foreach ($tags as $t_title) {
				$tag = $this->tag->tag_search($t_title);
				$t_id = $tag[0]['t_id'];
				$at[] = array('a_id' => $a_id['a_id'], 't_id' => $t_id);
			}
		}// end of foreach

		$this->tag->set_article_tag($at);

	}
	


}