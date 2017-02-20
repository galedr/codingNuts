<?php
class Back_end_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	//管理者登入，取得管理者資料

	public function adminLogin($adminAccount, $adminPassword)
	{
		$adminCheckStr = "SELECT * FROM admin WHERE a_account = '$adminAccount' AND a_password = '$adminPassword'";

		$adminQuery = $this->db->query($adminCheckStr);

		$result = $adminQuery->result_array($adminQuery);

		return $result;

	}

	public function get_admin_file($admin)
	{	
		$adminQueryStr = "SELECT * FROM admin WHERE a_account = '$admin'";

		$adminRec = $this->db->query($adminQueryStr);

		$result = $adminRec->result_array($adminRec);

		return $result;
	}

	//後台首頁，文章列表部分

	public function article_row($offset, $per_page)
	{
		$artQueryStr = "SELECT * FROM article ORDER BY a_id DESC";

		$artRec = $this->db->query($artQueryStr);

		$num_rows = $artRec->num_rows();

		$result['num_rows'] = $num_rows;

		$queryStr_select = "SELECT * FROM article";
		$queryStr_order_by = " ORDER BY a_id DESC";
		$queryStr_limit = " LIMIT ".$offset.",".$per_page;

		$pagiQueryStr = $queryStr_select.$queryStr_order_by.$queryStr_limit;

		$pagiRec = $this->db->query($pagiQueryStr);

		$result['article_data'] = $pagiRec->result_array($pagiRec);

		return $result;
	}

	//已發佈文章，與草稿文章

	public function posted_article()
	{
		$artQueryStr = "SELECT * FROM article WHERE a_status = '1' ORDER BY a_id DESC";

		$artRec = $this->db->query($artQueryStr);

		$result = $artRec->result_array($artRec);

		return $result;
	}

	public function draft_article()
	{
		$artQueryStr = "SELECT * FROM article WHERE a_status = '2' ORDER BY a_id DESC";

		$artRec = $this->db->query($artQueryStr);

		$result = $artRec->result_array($artRec);

		return $result;
	}

	public function article_category()
	{
		$queryStr = "SELECT c_title FROM category";

		$rec = $this->db->query($queryStr);

		$result = $rec->result_array($rec);

		return $result;
	}

	//Tag搜尋過濾資料輸出

	public function tag_search($input_text)
	{
		$queryStr = "SELECT t_title FROM tag WHERE t_title LIKE '%$input_text%'";
		
		$rec = $this->db->query($queryStr);

		$result = $rec->result_array($rec);

		return $result;
	}

}

?>