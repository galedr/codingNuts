<?php
class Articles extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	public function get_all()
	{
		$query = "SELECT * FROM article ORDER BY a_id DESC";
		$rec = $this->db->query($query);
		$result = $rec->result_array($rec);

		return $result;
	}

}
?>