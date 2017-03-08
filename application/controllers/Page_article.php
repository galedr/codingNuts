<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Page_article extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function make_content($a_id)
	{
		$this->load->Model('articles');
		$data['article'] = $this->articles->search_by_id($a_id);

		// 推薦文章，同分類別

		$recommand_key = $data['article'][0]['c_title'];
		$data['recommand'] = $this->articles->search_by_category($recommand_key);

		// 瀏覽數 + 1

		$cur_num = $data['article'][0]['a_checknum'];
		$a_checknum = $cur_num + 1;
		$this->articles->update_check_num($a_id, $a_checknum);

		$this->load->view('desktop/articles', $data);
	} 

}
?>