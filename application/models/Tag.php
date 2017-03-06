<?php

class Tag extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	public function tag_search($t_title)
	{
		$query = "SELECT * FROM tag WHERE t_title LIKE '%$t_title%'";
		$rec = $this->db->query($query);
		$result = $rec->result_array($rec);

		return $result;
	}

	public function set_tag($t_title)
	{	
		$this->db->query('TRUNCATE TABLE tag');

		foreach ($t_title as $tag) {
			$query = "INSERT INTO tag (t_title) VALUES ('".$tag."')";
			$rec = $this->db->query($query);
		}

		return;
	}

	public function set_article_tag($at)
	{
		$this->db->query('TRUNCATE TABLE article_tag');

		foreach ($at as $key => $val) {
			$query = "INSERT INTO article_tag (a_id, t_id) VALUES ('".$val['a_id']."','".$val['t_id']."')";
			$rec = $this->db->query($query);
		}

		return;
	}

}





?>