<?php
class Tag extends CI_Model
{
	public function __condtruct()
	{
		$this->load->database();
	}

	public function search($t_title)
	{
		$query = "SELECT * FROM tag WHERE t_title = '%$t_title%'";
		$rec = $this->db->query($query);
		$result = $rec->result_array($rec);

		return $result;
	}
}
?> 