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

		ob_start();

		$this->load->helper('cookie');

		$this->load->library('setsession');

	}

	public function back_end_index($num_page)
	{	

		//驗證是否已經登入，如果有，將登入人資訊取出

		if (!isset($_SESSION['codingNuts_admin'])) {

			header("location: ".base_url()."admin_login");

			echo "
					alert('請先登入管理員帳號');
				";
			

			return;
		}

		$this->load->Model('back_end_model');

		$result = $this->back_end_model->get_admin_file($_SESSION['codingNuts_admin']);

		$data['admin'] = $result;

		//取得分頁資料與文章

		$per_page = 10;

		$range = 2;
		$data['range'] = $range;

		$data['num_page'] = $num_page;

		$start_row = ($num_page - 1)*$per_page;
		
		$data['now_page'] = $num_page;//頁面計數用

		//將所有分頁及查詢參數回傳Model
		$pagiData = $this->back_end_model->article_row($start_row, $per_page);

		$data['article_row'] = $pagiData;

		//接收model回傳的row數值
		$data['total_rows'] = ceil($pagiData['num_rows']/$per_page);//頁面計數用

		

		//頁面所需，文章筆數

		$posted_article = $this->back_end_model->posted_article();

		$posted_num = count($posted_article);

		$data['article_num'] = array('total_num'=>$pagiData['num_rows'],
									'posted_num'=>$posted_num);

		//取出分類

		$data['article_category'] = $this->back_end_model->article_category();

		//所有後台所需資料匯入view

		$this->load->view('desktop/back_end_header', $data);
		$this->load->view('desktop/back_end_index');
	}

	//後台分類搜尋

	public function back_end_search($search_key, $search_txt, $num_page)
	{	

		//驗證是否已經登入，如果有，將登入人資訊取出

		if (!isset($_SESSION['codingNuts_admin'])) {

			header("location: ".base_url()."admin_login");

			echo "
					alert('請先登入管理員帳號');
				";
			

			return;
		}

		$this->load->Model('back_end_model');

		//取得登入者資料

		$result = $this->back_end_model->get_admin_file($_SESSION['codingNuts_admin']);

		$data['admin'] = $result;

		//取得分頁資料與文章

		$per_page = 10;//每頁顯示筆數

		$range = 2;//當前頁數前後顯示頁碼
		$data['range'] = $range;

		$data['search_key'] = $search_key;
		$data['search_txt'] = $search_txt;

		if ($search_key == 'category') {
			$cate = $this->back_end_model->cate_check_id($search_txt);
			$search_txt = $cate[0]['c_title'];
		}
		
		if ($search_key == 'tag') {
			if (isset($_POST['search_txt'])) {
				$search_txt = $_POST['search_txt'];
				$data['search_txt'] = $search_txt;
			}
		}

		$data['num_page'] = $num_page;

		$data['num_page'] = $num_page;

		$start_row = ($num_page - 1)*$per_page;

		$pagi_result = $this->back_end_model->article_search($start_row, $per_page, $search_txt, $search_key);

		$data['num_rows'] = $pagi_result['num_rows'];
		$data['article_data'] = $pagi_result['article_data'];
		$data['total_page'] = ceil($pagi_result['total_row']/$per_page);


		//頁面所需，文章筆數

		$all_article = $this->back_end_model->all_article();

		$total_num = count($all_article);

		$posted_article = $this->back_end_model->posted_article();

		$posted_num = count($posted_article);

		$data['article_num'] = array('total_num'=>$total_num,
									'posted_num'=>$posted_num);

		//取出分類

		$data['article_category'] = $this->back_end_model->article_category();

		//所有後台所需資料匯入view

		$this->load->view('desktop/back_end_header', $data);
		$this->load->view('desktop/back_end_search');
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

			header("location: ".base_url()."admin_login");

			return;
		}
		
		$this->setsession->admin_set('codingNuts_admin', $_POST['adminAccount']);
		
		header("location: ".base_url()."back_end/1");

	}

	public function logout()
	{
		$this->setsession->admin_unset();

		header("location: ".base_url());
	}

	//新增文章

	public function new_article()
	{
		$this->load->Model('back_end_model');

		$data['admin'] = $this->back_end_model->get_admin_file($_SESSION['codingNuts_admin']);

		//取得已有分類

		$data['used_category'] = $this->back_end_model->cate_all();
		
		$this->load->view('desktop/back_end_header', $data);
		$this->load->view('desktop/new_article');
	}

	public function add_article()
	{	
		$this->load->Model('back_end_model');

		// CI 表單驗證
		$this->load->library('form_validation');
		
		$config = array(
			array(
				'field' => 'postTitle',
				'label' => '標題',
				'rules' => 'required',
				'error' => array(
					'required' => '%s為必填欄位'),
				),
			array(
				'field' => 'postContent',
				'label' => '內文',
				'rules' => 'required',
				'error' => array(
					'required' => '請輸入%s'),
				),
			array(
				'field' => 'a_intro',
				'label' => 'a_intro',
				'rules' => 'required',
				),
			// array(
			// 	'field' => 'a_img',
			// 	'label' => '主圖',
			// 	'rules' => 'required',
			// 	'error' => array(
			// 		'required' => '%s必須選擇'),
			// 	),
			);

		$this->form_validation->set_rules($config);

		if ($this->form_validation->run() == false) {
			
			echo "
				<script>
					alert('標題，內文，主圖，簡介為必填欄位');
					history.go(-1);
				</script>
				 ";

			return;
		} 

		if (isset($_POST['postTitle']) and ($_POST['postTitle']) != '') {
			$postTitle = $_POST['postTitle'];
		}
		if (isset($_POST['postContent']) and ($_POST['postContent']) != '') {
			$postContent = $_POST['postContent'];
		}
		if (isset($_POST['a_intro']) and ($_POST['a_intro']) != "") {
			$a_intro = $_POST['a_intro'];
		}
		
		//若沒有設定日期與類別，用預設套入

		$postDateTime = date('y-m-t H:i:s');

		if (isset($_POST['insertClass']) and ($_POST['insertClass']) != '') {
			$postClass = $_POST['insertClass'];
		} else {
			$postClass = "無分類";
		}
		
		if (isset($_POST['insertTag']) and ($_POST['insertTag']) != '') {
			$tagString = $_POST['insertTag'];
			$postTag = explode(",", $_POST['insertTag']);
		} else {
			$postTag = "";
		}

		if (isset($_FILES['a_img']['name']) and ($_FILES['a_img']['name']) != '') {
			
			$a_img_name = $_FILES['a_img']['name'];
			$a_img_tmp = $_FILES['a_img']['tmp_name'];

		} else {

			echo "
				<script>
					alert('主圖為必填欄位');
					history.go(-1);
				</script>
				 ";

			return;

		}

		move_uploaded_file($a_img_tmp, "assets/img/".$a_img_name);

		$a_img = base_url()."assets/img/".$a_img_name;

		$poster = $this->back_end_model->get_admin_file($_SESSION['codingNuts_admin']);

		$poster = $poster[0]['a_nickname'];

		//取得此篇po文會取得的文章id

		$result = $this->back_end_model->all_article();

		$article_id = $result[0]['a_id']+1;

		//寫入article
		$insertStr = "INSERT INTO article (a_title,c_title,a_intro,a_content,a_img,a_nickname,a_tag,a_datetime) VALUES ('".$postTitle."','".$postClass."','".$a_intro."','".$postContent."','".$a_img."','".$poster."','".$tagString."','".$postDateTime."')";
		
		$rec = $this->db->query($insertStr);

		//寫入article_tag, tag
		if (is_array($postTag)) {
			
		
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
		header("location: ".base_url()."back_end");
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

	//修改文章

	public function article_edit($a_id)
	{
		$this->load->Model('back_end_model');

		$data['admin'] = $this->back_end_model->get_admin_file($_SESSION['codingNuts_admin']);

		$result = $this->back_end_model->article_row_id($a_id);

		$data['article_data'] = $result;

		$data['used_category'] = $this->back_end_model->cate_all();

		$this->load->view('desktop/back_end_header', $data);
		$this->load->view('desktop/article_edit');
	}

	public function article_update($a_id)
	{

		$this->load->Model('back_end_model');

		// CI 表單驗證
		$this->load->library('form_validation');
		
		$config = array(
			array(
				'field' => 'postTitle',
				'label' => '標題',
				'rules' => 'required',
				'error' => array(
					'required' => '%s為必填欄位'),
				),
			array(
				'field' => 'postContent',
				'label' => '內文',
				'rules' => 'required',
				'error' => array(
					'required' => '請輸入%s'),
				),
			array(
				'field' => 'a_intro',
				'label' => 'a_intro',
				'rules' => 'required',
				),
			// array(
			// 	'field' => 'a_img',
			// 	'label' => '主圖',
			// 	'rules' => 'required',
			// 	'error' => array(
			// 		'required' => '%s必須選擇'),
			// 	),
			);

		$this->form_validation->set_rules($config);

		if ($this->form_validation->run() == false) {
			
			echo "
				<script>
					alert('標題，內文，主圖為必填欄位');
					history.go(-1);
				</script>
				 ";

			return;
		} 

		if (isset($_POST['postTitle']) and ($_POST['postTitle']) != '') {
			$postTitle = $_POST['postTitle'];
		}
		if (isset($_POST['postContent']) and ($_POST['postContent']) != '') {
			$postContent = $_POST['postContent'];
		}
		if (isset($_POST['a_intro']) and ($_POST['a_intro']) != "") {
			$a_intro = $_POST['a_intro'];
		}
		
		//若沒有設定日期與類別，用預設套入

		$postDateTime = date('y-m-t H:i:s');

		if (isset($_POST['insertClass']) and ($_POST['insertClass']) != '') {
			$postClass = $_POST['insertClass'];
		} else {
			$postClass = "無分類";
		}
		// echo $postClass;exit;
		if (isset($_POST['insertTag']) and ($_POST['insertTag']) != '') {
			$tagString = $_POST['insertTag'];
			$postTag = explode(",", $_POST['insertTag']);
		} else {
			$postTag = "";
		}

		if (isset($_FILES['a_img']['name']) and ($_FILES['a_img']['name']) != '') {
			
			$a_img_name = $_FILES['a_img']['name'];
			$a_img_tmp = $_FILES['a_img']['tmp_name'];

			move_uploaded_file($a_img_tmp, "assets/img/".$a_img_name);

			$a_img = base_url()."assets/img/".$a_img_name;

		} else {

			$a_img = $_POST['a_img_source'];

		}

		

		$update_article = "UPDATE article SET a_title = '$postTitle', a_content = '$postContent',a_img = '$a_img', c_title = '$postClass', a_tag = '$tagString', a_intro = '$a_intro' WHERE a_id = '$a_id'";
		
		$updateRec = $this->db->query($update_article);

		// category

		$cate_check = $this->back_end_model->cate_check($postClass);

		if (count($cate_check) == 0) {

			$c_query = "INSERT INTO category (c_title) VALUES ('".$postClass."')";

			$c_rec = $this->db->query($c_query);

		} 

		$get_c_id = $this->back_end_model->cate_check($postClass);
		
		$c_id = $get_c_id[0]['c_id'];

		$update_ac = "UPDATE article_category SET c_id = '$c_id' WHERE a_id = '$a_id'";

		$update_ac_rec = $this->db->query($update_ac);

		// tag
		//重置article_tag雙關聯資料表

		$reset_at = "DELETE FROM article_tag WHERE a_id = '$a_id'";

		$reset_at_rec = $this->db->query($reset_at);

		foreach ($tagArr as $key => $tag) {
			
			$tag_check = $this->back_end_model->tag_check($tag);
			// check table tag
			if (count($tag_check) == 0) {
			
				$tag_query = "INSERT INTO tag (t_title) VALUES ('".$tag."')";

				$tag_rec = $this->db->query($tag_query);

			}

			// check table article_tag

			$t_check = $this->back_end_model->tag_check($tag);

			$reinsert_at = "INSERT INTO article_tag (t_id,a_id) VALUES ('".$t_check[0]['t_id']."','".$a_id."')";

			$reinsert_at_rec = $this->db->query($reinsert_at);


		}

		header("location: ".base_url()."back_end");

		
	}

}

?>