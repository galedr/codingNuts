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

}
?>