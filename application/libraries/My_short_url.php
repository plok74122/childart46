<?php
//require("PHPMailer/class.pop3.php");
class My_short_url {
	function My_short_url()
	{
		$this->ci =& get_instance();
	}
	public function google($longUrl , $apiKey)
	{
		// This is the URL you want to shorten
//		$longUrl = "http://www.kimo.com.tw/fdafdsf";
//		$apikey = 'AIzaSyA10giAwZOj9ZB7oXlebXf8gdlQFEuv_5g'
		// Get API key from : http://code.google.com/apis/console/
//		$apiKey = 'AIzaSyA10giAwZOj9ZB7oXlebXf8gdlQFEuv_5g';
		
		$postData = array('longUrl' => $longUrl, 'key' => $apiKey);
		$jsonData = json_encode($postData);
		
		$curlObj = curl_init();
		
		curl_setopt($curlObj, CURLOPT_URL, 'https://www.googleapis.com/urlshortener/v1/url');
		curl_setopt($curlObj, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curlObj, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($curlObj, CURLOPT_HEADER, 0);
		curl_setopt($curlObj, CURLOPT_HTTPHEADER, array('Content-type:application/json'));
		curl_setopt($curlObj, CURLOPT_POST, 1);
		curl_setopt($curlObj, CURLOPT_POSTFIELDS, $jsonData);
		
		$response = curl_exec($curlObj);
		// Change the response json string to object
		$json = json_decode($response);

		curl_close($curlObj);
		return $response;
//		print_r($response);
//		echo 'Shortened URL is: '.$json->id;
	}
}
