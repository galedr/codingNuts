<?php

class Pull_data_model extends CI_Model
{


	public function __construct()
	{	
		parent::__construct();

		$this->load->database();
	}

	public function all_article()
	{
		$query = "SELECT * FROM article ORDER BY a_id DESC";

		$rec = $this->db->query($query);

		$result = $rec->result_array($rec);

		return $result;
	}

	public function reset_category_article()
	{
		$query = "SELECT a_id, c_title FROM article";

		$rec = $this->db->query($query);

		$result = $rec->result_array($rec);

		return $result;
	}

	public function category_id($c_title)
	{
		$query = "SELECT c_id FROM category WHERE c_title = '$c_title'";

		$rec = $this->db->query($query);

		$result = $rec->result_array($rec);

		return $result;
	}

}





?>