<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pull_data extends CI_Controller {


	public function __construct()
	{

		parent::__construct();

	}

	public function all_article()
	{	
		$this->load->Model('pull_data_model');
		
		$result = $this->pull_data_model->all_article();

		$data = json_encode($result);

		file_put_contents("json_files/all_article.json", $data);
	}

	public function test()
	{
		$this->load->view('desktop/test');
	}


}