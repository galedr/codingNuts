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

	public function search_by_category($s_val)
	{
		$query = "SELECT * FROM article WHERE c_title = '$s_val' ORDER BY a_id DESC";
		$rec = $this->db->query($query);
		$result = $rec->result_array($rec);

		return $result;
	}

	public function search_by_tag($s_val)
	{
		$query = "SELECT * FROM article WHERE a_tag LIKE '%$s_val%' ORDER BY a_id DESC";
		$rec = $this->db->query($query);
		$result = $rec->result_array($rec);

		return $result;
	}

	public function search_by_id($a_id)
	{
		$query = "SELECT * FROM article WHERE a_id = '$a_id'";
		$rec = $this->db->query($query);
		$result = $rec->result_array($rec);

		return $result;
	}

	public function update_check_num($a_id, $a_checknum)
	{
		$query = "UPDATE article SET a_checknum = '$a_checknum' WHERE a_id = '$a_id'";
		$rec = $this->db->query($query);

		return;
	}

	public function make_new($db_arr)
	{	
		$db_arr = array_intersect_key($db_arr ,$this->db_col);
		$insert_key = array();
		$insert_val = array();
		foreach ($db_arr as $key => $val) {
			$insert_key[] = $key;
			$insert_val[] = "'$val'";
		}
		$insert_key = implode(",", $insert_key);
		$insert_val = implode(",", $insert_val);

		$query = "INSERT INTO article (".$insert_key.") VALUES (".$insert_val.")";
		$rec = $this->db->query($query);

		return;
	}


}
?>