<?php

class Articles extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	public function all_articles()
	{
		$query = "SELECT * FROM article ORDER BY a_id DESC";
		$rec = $this->db->query($query);
		$result = $rec->result_array($rec);

		return $result;
	}

	public function article_data($a_id)
	{
		$query = "SELECT * FROM article WHERE a_id = '$a_id'";
		$rec = $this->db->query($query);
		$result = $rec->result_array($rec);

		return $result;
	}

	public function article_data_category($c_title)
	{
		$query = "SELECT * FROM article WHERE c_title = '$c_title' ORDER BY a_id DESC";
		$rec = $this->db->query($query);
		$result = $rec->result_array($rec);

		return $result;
	}

	public function newest_article($row_out_num)
	{
		$query = "SELECT * FROM article ORDER BY a_id LIMIT 0,".$row_out_num;
		$rec = $this->db->query($query);
		$result = $rec->result_array($rec);

		return $result;
	}

	public function posted_article()
	{
		$query = "SELECT * FROM article WHERE a_status = '1'";
		$rec = $this->db->query($query);
		$result = $rec->result_array($rec);

		return $result;

	}

	public function article_search_category($s_val)
	{
		$query = "SELECT * FROM article WHERE c_title = '$s_val' ORDER BY a_id DESC";
		$rec = $this->db->query($query);
		$result = $rec->result_array($rec);

		return $result;
	}

	public function article_search_tag($s_val)
	{
		$query = "SELECT * FROM article WHERE a_tag LIKE '%$s_val%' ORDER BY a_id DESC";
		$rec = $this->db->query($query);
		$result = $rec->result_array($rec);

		return $result;
	}

	public function add_article($a_title, $c_title, $a_intro, $a_content, $a_img, $a_nickname, $a_tag, $a_datetime)
	{
		$query = "INSERT INTO article (a_title, c_title, a_intro, a_content, a_img, a_nickname, a_tag, a_datetime) VALUES ('".$a_title."','".c_title."','".$a_intro."','".$a_content."','".$a_img."','".$a_nickname."','".$a_tag."','".$a_datetime."')";
		$rec = $this->db->query($query);

		return;
	}

	public function update_article($a_id, $a_title, $c_title, $a_intro, $a_content, $a_img, $a_nickname, $a_tag, $a_datetime)
	{
		$query = "UPDATE article SET a_title = '$a_title', c_title = '$c_title', a_intro = '$a_intro', a_content = '$a_content', a_img = '$a_img', a_nickname = '$a_nickname', a_tag = '$a_tag', a_datetime = '$a_datetime' WHERE a_id = '$a_id'";
		$rec = $this->db->query($query);

		return;
	}

	public function article_delete($a_id)
	{
		$query = "DELETE FROM article WHERE a_id = '$a_id'";
		$rec = $this->db->query($query);

		return;
	}


}



?>