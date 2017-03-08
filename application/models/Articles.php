<?php
class Articles extends CI_Model
{	
	public $db_col = array(
					"a_title" => '',
					"c_title" => '',
					"a_intro" => '',
					"a_content" => '',
					"a_img" => '',
					"a_nickname" => '',
					"a_tag" => '',
					"a_datetime" => '',
					);

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

	public function get_newest($row_out_num)
	{
		$query = "SELECT * FROM article ORDER BY a_id LIMIT 0,".$row_out_num;
		$rec = $this->db->query($query);
		$result = $rec->result_array($rec);

		return $result;
	}


}
?>