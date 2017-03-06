<?php

class Admin extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	public function admin_check($a_account, $a_password)
	{
		$query = "SELECT * FROM admin WHERE a_account = '$a_account' AND a_password = '$a_password'";
		$rec = $this->db->query($query);
		$result = $rec->result_array($rec);

		return $result;
	}

	public function admin_data($a_account)
	{
		$query = "SELECT * FROM admin WHERE a_account = '$a_account'";
		$rec = $this->db->query($query);
		$result = $rec->result_array($rec);

		return $result;
	}

}




?>