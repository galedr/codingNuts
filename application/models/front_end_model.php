<?php
class Front_end_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	public function article_row($start_row, $per_page)
	{
		$art_queryStr = "SELECT * FROM article ORDER BY a_id DESC";

		$art_rec = $this->db->query($art_queryStr);

		$result['num_rows'] = $art_rec->num_rows();

		$queryStr_select = "SELECT * FROM article";
		$queryStr_order_dy = " ORDER BY a_id DESC";
		$queryStr_limit = " LIMIT ".$start_row.",".$per_page;

		$queryStr = $queryStr_select.$queryStr_order_dy.$queryStr_limit;

		$pagiRec = $this->db->query($queryStr);

		$result['article_data'] = $pagiRec->result_array($pagiRec);

		return $result;
	}

	public function index_search($start_row, $per_page, $search_key, $search_txt)
	{
		$queryStr_select = "SELECT * FROM article";
		$queryStr_order_dy = " ORDER BY a_id";
		$queryStr_limit = " LIMIT ".$start_row.",".$per_page;
		if ($search_key == "tag") {
			$queryStr_where = " WHERE a_tag LIKE '%$search_txt%'";
		} elseif ($search_key == "category") {
			$queryStr_where = " WHERE c_title = '$search_txt'";
		}

		$queryStr = $queryStr_select.$queryStr_where.$queryStr_order_dy.$queryStr_limit;

		$total_row = $this->db->query($queryStr_select.$queryStr_where);

		$result['num_rows'] = $total_row->num_rows();

		$rec = $this->db->query($queryStr);

		$result['article_data'] = $rec->result_array($rec);

		return $result;

	}

	public function category_row()
	{
		$queryStr = "SELECT * FROM category";

		$rec = $this->db->query($queryStr);

		$result = $rec->result_array($rec);

		return $result;
	}

}
?>