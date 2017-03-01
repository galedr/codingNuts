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
	public function all_article()
	{
		$queryStr = "SELECT * FROM article ORDER BY a_id DESC";

		$rec = $this->db->query($queryStr);

		$result = $rec->result_array($rec);

		return $result;
	}

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

	public function article_search($start_row, $per_page, $search_txt, $search_key)
	{

		$queryStr_select = "SELECT * FROM article";

		if ($search_key == 'category') {
			$queryStr_where = " WHERE c_title = '$search_txt'";
		} elseif ($search_key == 'tag') {
			$queryStr_where = " WHERE a_tag LIKE '%$search_txt%'";
		}

		$queryStr_order_by = " ORDER BY a_id DESC";

		$queryStr_limit = " LIMIT ".$start_row.",".$per_page;

		$queryStr = $queryStr_select.$queryStr_where.$queryStr_order_by.$queryStr_limit;

		//搜尋條件總筆數

		$total_query = $queryStr_select.$queryStr_where.$queryStr_order_by;

		$total_rec = $this->db->query($total_query);

		$total_row = $total_rec->num_rows();

		$result['total_row'] = $total_row;

		$rec = $this->db->query($queryStr);

		$result['num_rows'] = $rec->num_rows();

		$result['article_data'] = $rec->result_array($rec);

		return $result;
	}

	// a_id 找文章

	public function article_row_id($a_id)
	{
		$queryStr = "SELECT * FROM article WHERE a_id = '$a_id'";

		$rec = $this->db->query($queryStr);

		$result = $rec->result_array($rec);

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

	public function article_category()
	{
		$queryStr = "SELECT * FROM category";

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

	public function tag_check($tag)
	{
		$queryStr = "SELECT * FROM tag WHERE t_title = '$tag'";

		$rec = $this->db->query($queryStr);

		$result = $rec->result_array($rec);

		return $result;

	}

	//分類category資料取出

	public function cate_all()
	{
		$queryStr = "SELECT * FROM category ORDER BY c_id DESC";

		$rec = $this->db->query($queryStr);

		$result = $rec->result_array($rec);

		return $result;
	}

	public function cate_check($c_title)
	{
		$queryStr = "SELECT * FROM category WHERE c_title = '$c_title'";

		$rec = $this->db->query($queryStr);

		$result = $rec->result_array($rec);

		return $result;
	}

	public function cate_check_id($c_id)
	{
		$query = "SELECT * FROM category WHERE c_id = '$c_id'";

		$rec = $this->db->query($query);

		$result = $rec->result_array($rec);

		return $result;
	}

}

?>