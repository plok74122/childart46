<?php
class My_user_computer_info {
	function My_user_computer_info()
	{
		$this->ci =& get_instance();
//		$this->load->library('email');
	}
	public function user_computer_info($ip,$user_agent)
	{
		$time = date('Y-m-d H:i:s');
		$info = file_get_contents("http://www.useragentstring.com/?uas=".urlencode($user_agent)."&getJSON=all");
		$info=json_decode($info);
		if(preg_match("/(360se|LBBROWSER|115Chrome|BIDUBrowser|Maxthon|SaaYaa)/",$user_agent,$matchbrowser))
		{
			if($matchbrowser =="360se"){$browser_CN="360�s����";}
			else if($matchbrowser =="LBBROWSER"){$browser_CN="�y�\�w���s����";}
			else if($matchbrowser =="115Chrome"){$browser_CN="115���t�s����";}
			else if($matchbrowser =="BIDUBrowser"){$browser_CN="�ʫ��s����";}
			else if($matchbrowser =="Maxthon"){$browser_CN="�ƴ嶳�s����";}
			else if($matchbrowser =="SaaYaa"){$browser_CN="�{���s����";}
		}
		else{$browser_CN="";}
		$info->browser_CN=$browser_CN;
		$info= (array)$info;
		$ip_array = explode(".",$ip);
		$info['classa']=$ip_array[0];
		$info['classb']=$ip_array[1];
		$info['classc']=$ip_array[2];
		$info['classd']=$ip_array[3];
		return $info;
	}
}