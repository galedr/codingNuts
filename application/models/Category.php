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

	public function reset($cates)
	{
		$this->db->query('TRUNCATE TABLE category');

		foreach ($categories as $key => $cate) {
			$query = "INSERT INTO category (c_title) VALUES ('".$cate."')";
			$rec = $this->db->query($query);
		}// end of foreach
	}
}
?>