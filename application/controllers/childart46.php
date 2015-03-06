<?php
class Childart46 extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		ob_start();
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
		echo script_tag('childart46/assets/js/jquery.blockUI.js');
//		echo script_tag('childart46/assets/js/datepickerCHT.js');
	}
	public function index()
	{
		$this->load->view("childart46/templates/header");
		$this->load->view("childart46/templates/main_navigation");
		$this->load->view('childart46/news/bulletin');
		$this->load->view("childart46/templates/footer");
	}
	public function Registration_Form()
	{
		echo script_tag('childart46/assets/js/jquery.validate.js');
		echo script_tag('childart46/assets/js/additional-methods.js');

		$this->load->view("childart46/templates/header");
		$this->load->view("childart46/templates/main_navigation");
		$this->load->view("childart46/comments/Registration_Form");
		$this->load->view("childart46/templates/footer");
	}
	//輸出建立報名表
	public function Registration_Form_PDF()
	{
		$this->load->library('My_short_url');
		$apiKey ="AIzaSyC7YcAIShlA_WgPuSSYUPITdrWbmFx1DWY";
		$post_array = $this->input->post(NULL, TRUE);
		$pdf_array=$post_array;
		$school_info = $this->childart46_model->get_schoole_info($post_array['school']);
		$get_class_note = $this->childart46_model->pdf_class_note($post_array['selectclass']);
		$pdf_array['city']=$school_info[0]['city'];
		$pdf_array['school_name']=$school_info[0]['name'];
		$pdf_array['address']=$school_info[0]['address'];
		$pdf_array['phone']=$school_info[0]['phone'];
		$pdf_array['class_note'] = $get_class_note[0]['class_note'];
		$str=$this->encrypt->encode($pdf_array['username']."θ".$pdf_array['year']."θ".$pdf_array['title']."θ".$pdf_array['selectclass']."θ".$pdf_array['sex']."θ".$pdf_array['school']."θ".$pdf_array['grade']."θ".$pdf_array['teacher']."θ".$pdf_array['type']);
		$short_url = json_decode($this->my_short_url->google(base_url("childart46/item?ssid=".urlencode($str)),$apiKey));
		$pdf_array['url'] = $short_url->id;
//		$pdf_array['url'] = base_url("childart46/item?ssid=".urlencode($str));
		ob_clean();
		$this->load->view('childart46/tcpdf/Registration_Form',$pdf_array);
	}
	//處理收件
	public function item()
	{
		echo link_tag(array('href'=>'childart46/assets/css/jquery.mobile-1.3.1.css', 'rel' => 'stylesheet','type' => 'text/css','media'=>'screen,projection,print'));	
		echo script_tag('childart46/assets/js/jquery.mobile-1.3.1.min.js');

		$info =  explode("θ",$this->encrypt->decode($this->input->get('ssid')));
		$info_array['name'] = $info[0];
		$info_array['year'] = $info[1];
		$info_array['title'] = $info[2]; 
//		$info_array['selectclass'] = $info[3];
		$info_array['sex'] = $info[4];
		$info_array['school'] = $info[5];
		$info_array['grade'] = $info[6];
		$info_array['teacher'] = $info[7];
		$info_array['type'] = $info[8];
		$insert_array = $info_array;
		$info_array['ssid']=$this->input->get('ssid');
		$database = $info[3];
		//判斷是不是管理者
		$return_array = $this->childart46_model->check_item( $insert_array , $database );
		$item_no = $return_array[0]['no'];
		

		//判斷完成收件狀態後補上其他的資訊
		$school_info = $this->childart46_model->get_schoole_info($info[5]);
		$get_class_note = $this->childart46_model->pdf_class_note($info[3]);
		$info_array['city']=$school_info[0]['city'];
		$info_array['school_name']=$school_info[0]['name'];
		$info_array['address']=$school_info[0]['address'];
		$info_array['phone']=$school_info[0]['phone'];
		$info_array['class_note'] = $get_class_note[0]['class_note'];
		$info_array['rank'] = $return_array[0]['rank'];
		if($return_array[0]['no']=="")
		{
			$info_array['item_status'] = "未收件";
		}
		else
		{
			$info_array['item_status'] = "已收件：".$return_array[0]['date']."作品編號：".$item_no;
		}
		if($info_array['rank']=="")
		{
			$info_array['rank'] = "尚未評鑑";
		}
		if($this->session->userdata('admin')=="")
		{
			$this->load->view('childart46/item_mobile/user',$info_array);
		}
		//驗證是不是管理者進來的
		else if($this->session->userdata('concat_name')!="" and $this->session->userdata('concat_phone')!="" and $this->session->userdata('admin')=="receive_item")
		{
			if($this->encrypt->decode($this->input->get('dbctrl'))=="insert" and $item_no=="")
			{
				//確認是不是同一人重複送
				$check_double_array = $insert_array;
				unset($check_double_array['type']);
				unset($check_double_array['title']);
				unset($check_double_array['teacher']);
				unset($check_double_array['year']);
				$check_array =$this->childart46_model->check_item( $check_double_array , $database );
				if($check_array[0]['no']!="")
				{
					$info_array['alert'] = "重件：".$check_array[0]['no'];
				}
				else
				{
					//寫入
					$insert_array['concat_name']=$this->session->userdata('concat_name');
					$insert_array['concat_phone']=$this->session->userdata('concat_phone');
					$insert_array['date']=date('Y-m-d');
					$return_array =$this->childart46_model->insert_item( $insert_array , $database );
					$info_array['item_status'] = "已收件：".$insert_array['date']."作品編號：".$return_array[0]['no'];
					$info_array['alert'] = "作品編號：".$return_array[0]['no'];
				}
			}
			else if($this->encrypt->decode($this->input->get('dbctrl'))=="enforcement_insert" and $item_no=="")
			{
					//寫入
					$insert_array['concat_name']=$this->session->userdata('concat_name');
					$insert_array['concat_phone']=$this->session->userdata('concat_phone');
					$insert_array['date']=date('Y-m-d');
					$return_array =$this->childart46_model->insert_item( $insert_array , $database );
					$info_array['item_status'] = "已收件：".$insert_array['date']."作品編號：".$return_array[0]['no'];
					$info_array['alert'] = "作品編號：".$return_array[0]['no'];
			}
			else if($this->encrypt->decode($this->input->get('dbctrl'))=="insert" and $item_no != "")
			{
				$info_array['alert'] = "無法操作寫入，該作品編號為".$item_no;
			}		
			else if($this->encrypt->decode($this->input->get('dbctrl'))=="delete" and $item_no=="")
			{
				$info_array['alert'] = "無法操作刪除，該作品並未完成收件";
			}
			else if($this->encrypt->decode($this->input->get('dbctrl'))=="delete" and $item_no!="")
			{
				$query = $this->childart46_model->delete_item( $insert_array , $database );
				if($query)
				{
					$info_array['item_status'] = "未收件";
					$info_array['alert'] = "清除完成";
				}
				else
				{
					$info_array['alert'] = "刪除失敗";
				}
			}
			$this->load->view('childart46/item_mobile/superclps',$info_array);
		}
		else if($this->session->userdata('admin')=="evaluation_item")
		{
			$this->load->helper('url');
			echo $this->encrypt->decode($this->input->get('eval_ctrl'));
//			if($this->encrypt->decode($this->input->get('eval_ctrl'))!="特優" and $this->encrypt->decode($this->input->get('eval_ctrl'))!="優選"  and $this->encrypt->decode($this->input->get('eval_ctrl'))!="佳作" and $this->encrypt->decode($this->input->get('eval_ctrl'))!="解除評鑑")
//			{
//					
//			}
			if($this->encrypt->decode($this->input->get('eval_ctrl'))=="特優")
			{
				$this->childart46_model->set_rank('特優',$database,$item_no);
				ob_clean();
				redirect(base_url('childart46/item?ssid='.urlencode($this->input->get('ssid'))));
			}
			else if($this->encrypt->decode($this->input->get('eval_ctrl'))=="優選")
			{
				$this->childart46_model->set_rank('優選',$database,$item_no);
				ob_clean();
				redirect(base_url('childart46/item?ssid='.urlencode($this->input->get('ssid'))));
			}
			else if($this->encrypt->decode($this->input->get('eval_ctrl'))=="佳作")
			{
				$this->childart46_model->set_rank('佳作',$database,$item_no);
				ob_clean();
				redirect(base_url('childart46/item?ssid='.urlencode($this->input->get('ssid'))));
			}
			else if($this->encrypt->decode($this->input->get('eval_ctrl'))=="解除評鑑")
			{
				$this->childart46_model->set_rank('',$database,$item_no);
				ob_clean();
				redirect(base_url('childart46/item?ssid='.urlencode($this->input->get('ssid'))));
			}
			$this->load->view('childart46/item_mobile/superclps_evaluation',$info_array);
		}
	}

	
	//報名網頁使用相關ajax功能
	public function ajax_class()
	{
		$class = $this->input->post('class', TRUE);
		$data= $this->childart46_model->get_grade($class);
		ob_clean();
		echo json_encode($data);
	}	
	//處理返回地區的情況
	public function ajax_region()
	{
		$class = $this->input->post('class', TRUE);
		if($class == "elementary_low" or $class == "elementary_middle" or $class == "elementary_high")
		{
			$class = "國民小學";
		}
		else if($class == "kindergarten")
		{
			$class = "幼兒園";
		}
		else if($class == "junior")
		{
			$class = "國民中學";
		}
		else
		{
			$class = "";
		}
		$data= $this->childart46_model->get_region($class);
		ob_clean();
		echo json_encode($data);
//		print_r($data);
	}
	public function ajax_school()
	{
		$class = $this->input->post('class', TRUE);
		$region = $this->input->post('region', TRUE);
		if($class == "elementary_low" or $class == "elementary_middle" or $class == "elementary_high")
		{
			$class = "國民小學";
		}
		else if($class == "kindergarten")
		{
			$class = "幼兒園";
		}
		else if($class == "junior")
		{
			$class = "國民中學";
		}
		else
		{
			$class = "";
		}
		$data= $this->childart46_model->get_school($class,$region);
		ob_clean();
		echo json_encode($data);
	}
	public function ajax_class_one()
	{
		$data= $this->childart46_model->get_class();
		ob_clean();
		echo json_encode($data);
	}
	public function ajax_type()
	{
		$data= $this->childart46_model->get_type();
		ob_clean();
		echo json_encode($data);
	}
	
	//顯示統計頁面
	public function statistics()
	{
		echo script_tag('childart46/highcharts-4.1.3/js/highcharts.js');
		$database = $this->encrypt->decode($this->input->get('group'));
//		$database = "elementary_low" ;
		$view_array['statistics'] = $this->childart46_model->statistics($database);
		$view_array['class_note'] = $this->childart46_model->get_class_condition($database);
		$total=0;
		for($i=0 ; $i < count($view_array['statistics']['count']);$i++)
		{
			$total = $total + $view_array['statistics']['count'][$i];
		}
		$view_array['total'] = $total;
		$this->load->view("childart46/templates/header");
		$this->load->view("childart46/templates/main_navigation");
		$this->load->view('childart46/comments/statistics',$view_array);
		$this->load->view("childart46/templates/footer");
		
	}
	public function qrcode()
	{
		ob_clean();
		$this->load->library('My_qrcode');
		$this->my_qrcode->qrcode($this->input->get('str'));
	}	
	
}

?>