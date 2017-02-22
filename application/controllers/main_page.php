<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main_page extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct()
	{
		parent::__construct();

		$this->load->library('setsession');
	}

	public function index()
	{
		$this->load->Model('front_end_model');

		$per_page = 9;

		$num_page = 1;

		$range = 2;
		$data['range'] = $range;

		if (isset($_GET['num_page'])) {
			$num_page = $_GET['num_page'];
		}
		$data['num_page'] = $num_page;

		$start_row = ($num_page - 1)*$per_page;

		$pagi_result = $this->front_end_model->article_row($start_row, $per_page);

		$data['num_rows'] = $pagi_result['num_rows'];
		$data['article_data'] = $pagi_result['article_data'];
		$data['total_page'] = ceil($pagi_result['num_rows']/$per_page);




		$this->load->view('desktop/header_front', $data);
		$this->load->view('desktop/index');
		$this->load->view('desktop/footer_front');

	}
}