<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Back_end extends CI_Controller {

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

		$this->load->helper('cookie');

		$this->load->library('setsession');

	}

	public function back_end_index()
	{	

		//驗證是否已經登入，如果有，將登入人資訊取出

		if (!isset($_SESSION['codingNuts_admin'])) {

			header("location: ".base_url()."adminLogin");

			echo "
					alert('請先登入管理員帳號');
				";
			

			return;
		}

		$this->load->Model('back_end_model');

		$result = $this->back_end_model->get_admin_file($_SESSION['codingNuts_admin']);

		$data['admin'] = $result;

		//取得分頁資料與文章

		$config['base_url'] = site_url(strtolower(__CLASS__).'/'.__FUNCTION__);
		$config['per_page'] = 10;
		$config['use_page_numbers'] = true;
		//套上bootstrap的分頁設定
		$config['full_tag_open'] = '<li>' ;
		$config['full_tag_close'] = '</li>' ;
		$config['first_tag_open'] = '<li>' ;
		$config['first_tag_close'] = '</li>' ;
		$config['last_tag_open'] = '<li>' ;
		$config['last_tag_close'] = '</li>' ;
		$config['num_tag_open'] = '<li>' ;
		$config['num_tag_close'] = '</li>' ;
		$config['next_tag_open'] = '<li>' ;
		$config['next_tag_close'] = '</li>' ;
		$config['prev_tag_open'] = '<li>' ;
		$config['prev_tag_close'] = '</li>' ;
		// 目前頁面加上 class="active"，產生填滿的背景效果。
		$config['cur_tag_open'] = '<li class="active"><a><b>' ;
		$config['cur_tag_close'] = '</b></a></li>' ;

		//將起始筆數及每頁筆數傳給model，並接回結果
		//$page = url末端的頁數，如果沒有則為1
		$page = $this->uri->segment(3);

		$page = ($page == '')?1:$page; 
		$offset = $page == false?1:($config['per_page'] * ($page - 1));
		$data['now_page'] = $page;//頁面計數用

		//將所有分頁及查詢參數回傳Model
		$pagiData = $this->back_end_model->article_row($offset, $config['per_page']);

		$data['article_row'] = $pagiData;

		//接收model回傳的row數值
		$config['total_rows'] = $pagiData['num_rows'];
		$data['total_rows'] = ceil($config['total_rows']/$config['per_page']);//頁面計數用

		
		$this->load->library('pagination');

		$pagi_link = $this->pagination->initialize($config)->create_links();
		
		$data['pagi_link'] = $pagi_link;

		//頁面所需，文章筆數

		$posted_article = $this->back_end_model->posted_article();

		$posted_num = count($posted_article);

		$draft_article = $this->back_end_model->draft_article();

		$draft_num = count($draft_article);

		$data['article_num'] = array('total_num'=>$config['total_rows'],
									'draft_num'=>$draft_num,
									'posted_num'=>$posted_num);

		//取出分類

		$data['article_category'] = $this->back_end_model->article_category();

		//所有後台所需資料匯入view

		$this->load->view('desktop/back_end_index', $data);
	}

	//管理者登入

	public function admin_login()
	{	
		$this->load->view('desktop/admin_login');
	}

	public function admin_login_process()
	{
		if (isset($_POST['adminAccount']) == false or isset($_POST['adminPassword']) == false) {
			
			header("location: ".base_url()."admin_login");
			return;

		}

		$this->load->Model('back_end_model');

		$result = $this->back_end_model->adminLogin($_POST['adminAccount'], $_POST['adminPassword']);
		
		if (count($result) == 0) {
			
			echo "
					<script>
						alert('您輸入的帳號或密碼有誤喔');
					</script>
				";

			header("location: ".base_url()."admi_login");

			return;
		}
		
		$this->setsession->admin_set('codingNuts_admin', $_POST['adminAccount']);
		
		header("location: ".base_url()."back_end");

	}

	//新增文章

	public function new_article()
	{
		$this->load->Model('back_end_model');

		$data['admin'] = $this->back_end_model->get_admin_file($_SESSION['codingNuts_admin']);
		
		$this->load->view('desktop/new_article', $data);
	}

	public function add_article()
	{	
		$this->load->Model('back_end_model');

		if (isset($_POST['postTitle']) and ($_POST['postTitle']) != '') {
			$postTitle = $_POST['postTitle'];
		}
		if (isset($_POST['postContent']) and ($_POST['postContent']) != '') {
			$postContent = $_POST['postContent'];
		}
		
		//若沒有設定日期與類別，用預設套入

		$postDateTime = date('y-m-t H:i:s');

		if ($_POST['postClass'] == '') {
			$postClass = "無題";
		} else {
			$postClass = $_POST['postClass'];
		}

		if ($_POST['postTag'] == '') {
			$postTag = "隨筆";
		} else {
			$postTag = explode(",", $_POST['postTag']);
		}

		$poster = $this->back_end_model->get_admin_file($_SESSION['codingNuts_admin']);

		$poster = $poster[0]['a_nickname'];

		//取得此篇po文會取得的文章id

		$result = $this->back_end_model->all_article();

		$article_id = $result[0]['a_id']+1;

		//寫入article
		$insertStr = "INSERT INTO article (a_title,c_title,a_content,a_nickname,a_tag,a_datetime) VALUES ('".$postTitle."','".$postClass."','".$postContent."','".$poster."','".$_POST['postTag']."','".$postDateTime."')";
		
		$rec = $this->db->query($insertStr);

		//寫入article_tag, tag
		foreach ($postTag as $key => $tag) {
				
			$tag_count = $this->back_end_model->tag_check($tag);

			if (count($tag_count) == 0) {
				
				$t_queryStr = "INSERT INTO tag (t_title) VALUES ('".$tag."')";

				$t_rec = $this->db->query($t_queryStr);

			}
		}//end of foreach
		foreach ($postTag as $key => $tag) {
			
			$tag_id = $this->back_end_model->tag_check($tag);

			$tag_id = $tag_id[0]['t_id'];

			$at_queryStr = "INSERT INTO article_tag (a_id,t_id) VALUES ('".$article_id."','".$tag_id."')";

			$at_rec = $this->db->query($at_queryStr);
		}

		//category

		$cate_check = $this->back_end_model->cate_check($postClass);

		if (count($cate_check) == 0) {
			
			$c_insertStr = "INSERT INTO category (c_title) VALUES ('".$postClass."')";

			$c_rec = $this->db->query($c_insertStr);

			$c_id = $this->back_end_model->cate_all();

			$c_id = $c_id[0]['c_id'];

			$ac_insertStr = "INSERT INTO article_category (c_id,a_id) VALUES ('".$c_id."','".$article_id."')";

			$ac_rec = $this->db->query($ac_insertStr);

		} else {

			$c_id = $cate_check[0]['c_id'];

			$ac_insertStr = "INSERT INTO article_category (c_id,a_id) VALUES ('".$c_id."','".$article_id."')";

			$ac_rec = $this->db->query($ac_insertStr);

		}



		echo json_encode(array('status'=>'success'));

	}

	//文章新Tag輸入偵測，相似資料輸出

	public function tag_search()
	{
		$input_text = $_POST['search_text'];
		
		$this->load->Model('back_end_model');
	
		//將搜尋結果作成html 格式回傳
		$result = array();	

		$data = $this->back_end_model->tag_search($input_text);

		foreach ($data as $key => $tag) {
			foreach ($tag as $key => $t_title) {
				$result[] = "<span>".$t_title."</span>";	
			}
		}	
		// continue;
		
		$dataReturn = implode(" ", $result);
		
		echo json_encode(array('status'=>'success', 'data'=>$dataReturn));
		
	}


}

?>