<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(APPPATH."controllers/MY_Controller.php");

class Page_back_end extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();

		ob_start();

		$this->load->library('setsession');
	}

	public function admin_login_page()
	{
		$this->load->view('desktop/admin_login');
	}

	public function admin_login()
	{
		$admin_account = (empty($_POST['adminAccount'])) ? false : $_POST['adminAccount'];
		$admin_password = (empty($_POST['adminPassword'])) ? false : $_POST['adminPassword'];

		if ($admin_account == false or $admin_password == false) {
			$data['error_message'] = "您的帳號與密碼皆不能為空白";
			$data['redirect'] = base_url()."back_end/admin_login";

			$this->load->view('desktop/error_page', $data);
			return;
		}

		$this->load->Model('admin');

		$result = $this->admin->check($admin_account, $admin_password);

		if (count($result) == 0) {
			$data['error_message'] = "您的帳號或密碼有誤";
			$data['redirect'] = base_url()."back_end/admin_login";

			$this->load->view('desktop/error_page', $data);
			return;
		}

		$session_key = "codingNuts_admin";
		
		$this->setsession->admin_set($session_key, $result);

		header("location:".base_url()."back_end");
	}

	public function output_list()
	{
		
	}

}

?>