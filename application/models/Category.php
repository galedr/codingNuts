<?php

class Category extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	public function all_category()
	{
		$query = "SELECT * FROM category ORDER BY c_id DESC";
		$rec = $this->db->query($query);
		$result = $rec->result_array($rec);
		
		return $result;
	}

	public function category_data_title($c_title)
	{
		$query = "SELECT c_id FROM category WHERE c_title = '$c_title'";
		$rec = $this->db->query($query);
		$result = $rec->result_array($rec);

		return $result;
	}

	public function set_category($categories)
	{	
		$this->db->query('TRUNCATE TABLE category');

		foreach ($categories as $key => $cate) {
			$query = "INSERT INTO category (c_title) VALUES ('".$cate."')";
			$rec = $this->db->query($query);
		}// end of foreach
	}

	public function set_article_category($ac)
	{
		$this->db->query('TRUNCATE TABLE article_category');

		foreach ($ac as $key => $val) {
			$query = "INSERT INTO article_category (c_id, a_id) VALUES ('".$val['c_id']."','".$val['a_id']."')";
			$rec = $this->db->query($query);
		}// end of foreach
	}

}




?>