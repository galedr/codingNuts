<?php
class Category extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	public function get_all()
	{
		$query = "SELECT * FROM category ORDER BY c_id DESC";
		$rec = $this->db->query($query);
		$result = $rec->result_array($rec);
		
		return $result;
	}

	public function search_by_title($c_title)
	{
		$query = "SELECT * FROM category WHERE c_title = '$c_title'";
		$rec = $this->db->query($query);
		$result = $rec->result_array($rec);

		return $result;
	}

	public function reset($cates)
	{
		$this->db->query('TRUNCATE TABLE category');

		foreach ($cates as $key => $cate) {
			$query = "INSERT INTO category (c_title) VALUES ('".$cate."')";
			$rec = $this->db->query($query);
		}// end of foreach
	}

	public function reset_ac($ac)
	{
		$this->db->query('TRUNCATE TABLE article_category');

		foreach ($ac as $key => $val) {
			$query = "INSERT INTO article_category (c_id, a_id) VALUES ('".$val['c_id']."','".$val['a_id']."')";
			$rec = $this->db->query($query);
		}// end of foreach
	}
}
?>