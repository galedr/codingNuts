<?php
class Tag extends CI_Model
{
	public function __condtruct()
	{
		$this->load->database();
	}

	public function search($t_title)
	{
		$query = "SELECT * FROM tag WHERE t_title LIKE '%$t_title%'";
		$rec = $this->db->query($query);
		$result = $rec->result_array($rec);

		return $result;
	}

	public function accurate_search($t_title)
	{
		$query = "SELECT * FROM tag WHERE t_title = '$t_title'";
		$rec = $this->db->query($query);
		$result = $rec->result_array($rec);

		return $result;
	}

	public function reset($t_title)
	{
		$this->db->query('TRUNCATE TABLE tag');

		foreach ($t_title as $key => $val) {
			$query = "INSERT INTO tag (t_title) VALUES ('".$val."')";
			$rec = $this->db->query($query);
		}

		return;
	}

	public function reset_at($at)
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