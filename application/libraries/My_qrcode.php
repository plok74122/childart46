<?php
require("phpqrcode/qrlib.php");
class My_qrcode {
	function My_qrcode()
	{
		$this->ci =& get_instance();
	}
	public function qrcode($str)
	{
		QRcode::png($str);
	}
}
