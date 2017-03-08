<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH."controllers/MY_Controller");

class Page_back_end extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->library('setsession');
	}

}

?>