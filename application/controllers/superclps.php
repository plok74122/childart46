<?php
class Superclps extends CI_Controller {
	public function __construct()
	{
		ob_start();
		parent::__construct();
		$this->load->model('childart46_model');
		$this->load->library('parser');
		$this->load->library('encrypt');
		$this->load->library('session');
		$this->load->helper('html');
		$this->load->helper('url');		
		//產生表頭
		echo doctype();
		$meta = array(
		        array('name' => 'robots', 'content' => 'no-cache'),
		        array('name' => 'description', 'content' => '世界兒童畫展'),
		        array('name' => 'keywords', 'content' => '畫展, 兒童, 繪畫比賽, 競賽'),
		        array('name' => 'Content-type', 'content' => 'text/html; charset=utf-8', 'type' => 'equiv')
		);
		echo meta($meta);
		echo link_tag(array('href'=>'childart46/assets/css/jquery-ui-1.10.3.css', 'rel' => 'stylesheet','type' => 'text/css','media'=>'screen,projection,print'));	
		echo link_tag(array('href'=>'childart46/assets/css/layout2_setup.css', 'rel' => 'stylesheet','type' => 'text/css','media'=>'screen,projection,print'));
		echo link_tag(array('href'=>'childart46/assets/css/layout2_text.css', 'rel' => 'stylesheet','type' => 'text/css','media'=>'screen,projection,print'));
		echo link_tag(array('href'=>'childart46/assets/css/bootstrap.min.css', 'rel' => 'stylesheet','type' => 'text/css','media'=>'screen,projection,print'));
		echo link_tag(array('href'=>'childart46/assets/lwtCountdown/style/main.css', 'rel' => 'stylesheet','type' => 'text/css','media'=>'screen,projection,print'));
		echo link_tag(array('href'=>'childart46/assets/img/favicon.GIF', 'rel' => 'icon','type' => 'image/x-icon'));
		echo script_tag('childart46/assets/js/jquery-2.1.1.min.js');	
		echo script_tag('childart46/assets/lwtCountdown/js/jquery.lwtCountdown-1.0.js');
		echo script_tag('childart46/assets/lwtCountdown/js/misc.js');
		echo script_tag('childart46/assets/js/jquery-ui-1.10.3.js');
		echo script_tag('childart46/assets/js/datepickerCHT.js');
	}
	public function index()
	{
		$this->load->view("childart46/templates/header");
		$this->load->view("childart46/templates/main_navigation_admin");
		$this->load->view('childart46/news/bulletin');
		$this->load->view("childart46/templates/footer");
	}
	public function receive_qrcode()
	{
		if($this->session->userdata('admin')=="")
		{
			ob_end_clean();
			redirect('superclps/index');
		}
		else
		{
			echo script_tag('childart46/assets/js/jquery.validate.js');
			echo script_tag('childart46/assets/js/additional-methods.js');
			$post_array=$this->input->post();
			$query_array = array('concat_name' => $post_array['name'] , 'concat_phone' => $post_array['phone'] );
			$post_array['date'] = $this->childart46_model->get_receive_list_date($query_array);
			$str=urlencode($this->encrypt->encode($post_array['name']."$%".$post_array['phone']));
			$post_array['url'] = base_url("superclps/set_session_receive?str=".$str);
			$this->load->view("childart46/templates/header");
			$this->load->view("childart46/templates/main_navigation_admin");
			$this->load->view("childart46/admin/receive_qrcode",$post_array);
			$this->load->view("childart46/templates/footer");
		}
	}
	public function receive_list()
	{
		if($this->session->userdata('admin')=="")
		{
			ob_end_clean();
			redirect('superclps/index');
		}
		else
		{		
			$send_name = $this->input->post('content_name');
			$phone = $this->input->post('content_phone');
			$receive_date = $this->input->post('date');
			$receive_list['item'] = $this->childart46_model->get_receive_list( $send_name , $phone , $receive_date);
			$receive_list['content_info'] = $send_name."-".$phone;
			$receive_list['receive_date'] = $receive_date;
			ob_clean();
			$this->load->view("childart46/tcpdf/Receive_list",$receive_list);
		}	
	}
	public function set_session_receive()
	{
		echo $this->encrypt->decode($this->input->get('str'));
		$info =  explode("$%",$this->encrypt->decode($this->input->get('str')));
		if($info[0]!="" and $info[1]!="")
		{
			$session_array = array(
				'concat_name'=> $info[0],
				'concat_phone'=> $info[1],
				'admin'=>'receive_item'
			);
			$this->session->set_userdata($session_array);
		}
		print_r($this->session->all_userdata());
	}
	//產生評定的QR-OCDE
	public function evaluation_item_qrcode()
	{
		if($this->session->userdata('admin')=="")
		{
			ob_end_clean();
			redirect('superclps/index');
		}
		else
		{				
			$post_array['url'] = base_url("superclps/set_session_evaluation?str=".MD5('設定評鑑字串'));
			$this->load->view("childart46/templates/header");
			$this->load->view("childart46/templates/main_navigation_admin");
			$this->load->view("childart46/admin/evaluation_qrcode",$post_array);
			$this->load->view("childart46/templates/footer");
		}
	}
	public function set_session_evaluation()
	{
		echo $this->input->get('str');
		echo "<br>";
		echo $this->encrypt->decode(urldecode($this->input->get('str')));
		echo "<br>";
		if($this->input->get('str') == MD5('設定評鑑字串'))
		{
			$session_array = array(
				'admin'=>'evaluation_item'
			);
			$this->session->set_userdata($session_array);
		}
		else
		{
			echo "fail";
		}
//		print_r($this->session->all_userdata());
	}
	//下載獲獎清單
	public function rank_list_PDF()
	{
		if($this->session->userdata('admin')=="")
		{
			ob_end_clean();
			redirect('superclps/index');
		}
		else
		{		
			$database = $this->encrypt->decode($this->input->get('str'));
			$receive_list['class_note'] = $this->childart46_model->get_class_condition($database);
			$receive_list['count'] = $this->childart46_model->rank_count($database);
			$receive_list['item'] = $this->childart46_model->rank_list($database);
	//		ob_clean();
	//		print_r($receive_list);
			ob_end_clean();
			$this->load->view("childart46/tcpdf/Rank_list",$receive_list);		
		}
	}
//	public function test()
//	{
//		$query_array = array('concat_name' => '吳大頭' , 'concat_phone' => '0928138411' );
//		print_r($this->childart46_model->get_receive_list_date($query_array));
//	}
	
	//操作登入頁面
	public function login_check()
	{
		$account = $this->input->post('account');
		$password = $this->input->post('password');
		$check_array = array('account' => $account , 'password' => MD5($password));
		$return = $this->childart46_model->login_check($check_array);
		if($return == 1)
		{
			$session_array = array(
				'admin'=>'login_success'
			);
			$this->session->set_userdata($session_array);
			ob_end_clean();
			redirect('superclps/index');
		}
		else
		{
			ob_end_clean();
			redirect('superclps/index');
		}
	}
	//登出頁面
	public function logout()
	{
		ob_end_clean();
		$this->session->sess_destroy();
		redirect('superclps/index');
	}
	
	//ajax keyword
	public function ajax_keyword()
	{
		if($this->input->post('keyword') !="")
		{
			ob_clean();
			$this->load->library('My_short_url');
			$apiKey ="AIzaSyC7YcAIShlA_WgPuSSYUPITdrWbmFx1DWY";
			$keyword_array = explode(' ', $this->input->post('keyword'));
			$return_array = $this->childart46_model->ajax_keyword($keyword_array);
			//重新處理陣列內容
			echo "<h1 class=\"block\">請使用對應QRCODE</h1>";
			echo "<div class=\"column1-unit\">";
			echo "<table>";
			echo "<tr><th class=\"top\" scope=\"col\">編號</th><th class=\"top\" scope=\"col\">姓名(年齡-性別)</th><th class=\"top\" scope=\"col\">標題</th><th class=\"top\" scope=\"col\">指導老師</th><th class=\"top\" scope=\"col\">學校</th><th class=\"top\" scope=\"col\">QRCODE</th></tr>";
			for($i=0 ; $i < count($return_array) ; $i++)
			{
				$str=$this->encrypt->encode($return_array[$i]['name']."θ".$return_array[$i]['year']."θ".$return_array[$i]['title']."θ".$this->childart46_model->get_selectclass($return_array[$i]['grade'])."θ".$return_array[$i]['sex']."θ".$return_array[$i]['school']."θ".$return_array[$i]['grade']."θ".$return_array[$i]['teacher']."θ".$return_array[$i]['type']);
				$url =base_url("childart46/item?ssid=".urlencode($str));
//				$url = json_decode($this->my_short_url->google(base_url("childart46/item?ssid=".urlencode($str)),$apiKey));
//				$url = $url->id;
				echo "<tr><th scope=\"row\">".$return_array[$i]['no']."</th><td>".$return_array[$i]['name']."(".$return_array[$i]['year']."-".$return_array[$i]['sex'].")</td><td>".$return_array[$i]['title']."</td><td>".$return_array[$i]['teacher']."</td><td>".$return_array[$i]['school_name']."</td><td><a target=\"_blank\" href=\"".base_url('childart46/qrcode')."?str=".urlencode($url)."\">QRCODE</a></td></tr>";
			}
			echo "</table>";
		}
	}	
}

?>