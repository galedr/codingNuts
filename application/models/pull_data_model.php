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


}





?>