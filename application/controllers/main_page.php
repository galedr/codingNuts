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

		//文章row out

		$per_page = 9;

		$num_page = 1;

		$range = 2;
		$data['range'] = $range;

		if (isset($_GET['page'])) {
			$num_page = $_GET['page'];
		}
		$data['num_page'] = $num_page;

		$start_row = ($num_page - 1)*$per_page;

		$pagi_result = $this->front_end_model->article_row($start_row, $per_page);

		$data['num_rows'] = $pagi_result['num_rows'];
		$data['article_data'] = $pagi_result['article_data'];
		$data['total_page'] = ceil($pagi_result['num_rows']/$per_page);

		//分類 row out

		$data['category'] = $this->front_end_model->category_row();

		//最新文章

		$data['newest_article'] = $this->front_end_model->newest_article();

		$this->load->view('desktop/header_front', $data);
		$this->load->view('desktop/index');
		$this->load->view('desktop/footer_front');
	}

	public function index_search()
	{
		// if get 關鍵字搜尋

		if (isset($_GET['search_key']) and ($_GET['search_key']) != "") {
			$search_key = $_GET['search_key'];
		}
		if (isset($_GET['search_txt']) and ($_GET['search_txt']) != "") {
			$search_txt = $_GET['search_txt'];
		}

		$per_page = 9;

		$num_page = 1;

		$range = 2;
		$data['range'] = $range;

		if (isset($_GET['page']) and ($_GET['page']) != "") {
			$num_page = $_GET['page'];
		}
		$data['num_page'] = $num_page;

		$start_row = ($num_page - 1)*$per_page;

		$this->load->Model('front_end_model');

		$pagi_result = $this->front_end_model->index_search($start_row, $per_page, $search_key, $search_txt);

		$data['num_rows'] = $pagi_result['num_rows'];

		$data['article_data'] = $pagi_result['article_data'];

		$data['total_page'] = ceil($pagi_result['num_rows']/$per_page);

		$data['search_key'] = $search_key;
		$data['search_txt'] = $search_txt;

		$data['category'] = $this->front_end_model->category_row();

		$this->load->view('desktop/header_front', $data);
		$this->load->view('desktop/index_search');
		$this->load->view('desktop/footer_front');
			
	}

	public function articles($a_id)
	{
		$this->load->Model('front_end_model');

		$data['category'] = $this->front_end_model->category_row();

		$result = $this->front_end_model->article($a_id);

		$data['article'] = $result;

		//取出相關文章

		$data['recommand'] = $this->front_end_model->recommand_article($result[0]['c_title'], $a_id);

		$this->load->view('desktop/header_front', $data);
		$this->load->view('desktop/articles');
		$this->load->view('desktop/footer_front');
	}

	//會員登入登出

	public function member_login()
	{
		if (isset($_POST['member_account']) == false or isset($_POST['member_password']) == false) {
			
			header("location: ".base_url());
			return;

		}

		$this->load->Model('front_end_model');

		$result = $this->front_end_model->member_login($_POST['member_account'], $_POST['member_password']);
		
		if (count($result) == 0) {
			
			echo "
					<script>
						alert('您輸入的帳號或密碼有誤喔');
					</script>
				";

			header("location: ".base_url());

			return;
		}
		
		$this->setsession->member_set('codingNuts_member', $_POST['member_account']);
		
		header("location: ".base_url());

	}

	//會員註冊

	public function member_resign()
	{
		$this->load->Model('front_end_model');

		$this->load->library('form_validation');

		$config = array(
					array(
						'field' => 'm_account',
						'label' => 'm_account',
						'rules' => 'required',
						),
					array(
						'field' => 'm_password',
						'label' => 'm_password',
						'rules' => 'required',
						),
					array(
						'field' => 'm_password_conf',
						'label' => 'm_password_conf',
						'rules' => 'required|matches[m_password]',
						),

					);

		$this->form_validation->set_rules($config);

		$m_acc_check = $this->front_end_model->get_member_file($_POST['m_account']);

		if (count($m_acc_check) > 0) {
			
			echo "
				<script>
					alert('您的帳號已經被使用了');
					history.go(-1);
				</script>
				";

			return;


		} elseif ($this->form_validation->run() == false) {
			
			echo "
				<script>
					alert('密碼與驗證不相符');
					history.go(-1);
				</script>
				";

			return;

		} else {

			$m_account = $_POST['m_account'];

			$m_password = $_POST['m_password'];

			if (isset($_POST['m_nickname']) and ($_POST['m_nickname']) != "") {
				$m_nickname = $_POST['m_nickname'];
			} else {
				$m_nickname = $_POST['m_account'];
			}

			if (isset($_FILES['m_img']['name']) and ($_FILES['m_img']['name']) != "") {

				$m_img_name = $_FILES['m_img']['name'];
				$m_img_tmp = $_FILES['m_img']['tmp_name'];

				mkdir("assets/img/memberImg/".$m_account,0777,true);
				move_uploaded_file($m_img_tmp, "assets/img/memberImg/".$m_account."/".$m_img_name);

				$m_img = base_url()."assets/img/memberImg/".$m_account."/".$m_img_name;

			} else {
				$m_img = base_url()."assets/img/memberImg/default.jpg";
			}

			$creat_member = "INSERT INTO member (m_account,m_password,m_img,m_nickname) VALUES ('".$m_account."','".$m_password."','".$m_img."','".$m_nickname."')";

			$cm_rec = $this->db->query($creat_member);


			$this->setsession->member_set('codingNuts_member', $_POST['m_account']);

			
			echo "
				<script>
					alert('恭喜您註冊成功');
					window.location='".base_url()."';
				</script>
				";
		}	
	}

	public function member_logout()
	{
		$this->setsession->member_unset();

		header("location:".base_url());
	}

	//收藏

	public function collect_check()
	{

		if (isset($_POST['a_id'])) {
			
			$a_id = $_POST['a_id'];

		}

		$m_account = $_SESSION['codingNuts_member'];

		if (isset($_SESSION['article_collect'][$m_account][$a_id])) {
			
			//從有收藏，點擊後變沒收藏

			$collect_status = false;

			$this->setsession->unset_collect($a_id, $m_account);

		} else {

			//從沒收藏，點擊後變有收藏

			$collect_status = true;

			$this->setsession->set_collect($a_id, $m_account);

		}

		echo json_encode(array('status'=>'success','data'=>$collect_status));

	}

	public function unset_collect()
	{

		if (isset($_POST['a_id'])) {
			$a_id = $_POST['a_id'];
		}
		if (isset($_POST['m_account'])) {
			$m_account = $_POST['m_account'];
		}

		$this->setsession->unset_collect($a_id, $m_account);

		echo json_encode(array('status'=>'success'));

	}




}