<?php
	$times=mktime(8,0,0,4,13,2015);
	$time1=mktime(16,0,0,4,15,2015);
	$time2=mktime(8,0,0,4,18,2015);
	$time3=mktime(15,0,0,4,18,2015);
	$time =time();
?>
<div class="main">
	<div class="main-navigation">
		<div class="round-border-topright"></div>
			<h1 class="first">比賽資訊</h1>
				<!-- Navigation with grid style -->
				<dl class="nav3-grid">
					<dt><a href="<?php echo base_url("/childart46/Registration_Form");?>">創建您的報名表</a></dt>
					<dt><a href="<?php echo base_url("/childart46/about");?>">第46屆世界兒童畫展作品比賽徵集</a></dt>
					<dt><a href="<?php echo base_url("/childart46/howtocreate");?>">網站報名表使用說明</a></dt>
				</dl>
			<?php if($times <= $time):?>
			<h1 class="first">參賽狀況</h1>
				<dl class="nav3-grid">
					<dt><a href="<?php echo base_url("childart46/statistics?group=".urlencode($this->encrypt->encode('kindergarten')));?>">幼兒園組</a></dt>
					<dt><a href="<?php echo base_url("childart46/statistics?group=".urlencode($this->encrypt->encode('elementary_low')));?>">國小低年級組</a></dt>
					<dt><a href="<?php echo base_url("childart46/statistics?group=".urlencode($this->encrypt->encode('elementary_middle')));?>">國小中年級組</a></dt>
					<dt><a href="<?php echo base_url("childart46/statistics?group=".urlencode($this->encrypt->encode('elementary_high')));?>">國小高年級組</a></dt>
					<dt><a href="<?php echo base_url("childart46/statistics?group=".urlencode($this->encrypt->encode('junior')));?>">國中組</a></dt>
					<dt><a href="<?php echo base_url("childart46/statistics?group=".urlencode($this->encrypt->encode('group')));?>">團體組</a></dt>
				</dl>
			<?php endif;?>
			<?php if($time3 <= $time):?>
			<h1 class="first">獲獎名單</h1>
				<dl class="nav3-grid">
					<dt><a href="<?php echo base_url("childart46/winners?group=".urlencode($this->encrypt->encode('kindergarten')));?>">幼兒園組</a></dt>
					<dt><a href="<?php echo base_url("childart46/winners?group=".urlencode($this->encrypt->encode('elementary_low')));?>">國小低年級組</a></dt>
					<dt><a href="<?php echo base_url("childart46/winners?group=".urlencode($this->encrypt->encode('elementary_middle')));?>">國小中年級組</a></dt>
					<dt><a href="<?php echo base_url("childart46/winners?group=".urlencode($this->encrypt->encode('elementary_high')));?>">國小高年級組</a></dt>
					<dt><a href="<?php echo base_url("childart46/winners?group=".urlencode($this->encrypt->encode('junior')));?>">國中組</a></dt>
					<dt><a href="<?php echo base_url("childart46/winners?group=".urlencode($this->encrypt->encode('group')));?>">團體組</a></dt>
				</dl>
			<?php endif;?>		
			<?php if($this->session->userdata('admin')!=""):?>
			<h1 class="first">管理操作</h1>
				<dl class="nav3-grid">
					<dt><a href="<?php echo base_url("superclps/receive_qrcode");?>">收件掃描</a></dt>
					<dt><a href="<?php echo base_url("superclps/evaluation_item_qrcode");?>">評鑑掃描</a></dt>
			</dl>				
			<h1 class="first">獲獎名單清冊</h1>
				<dl class="nav3-grid">
					<dt><a href="<?php echo base_url("superclps/rank_list_PDF?str=".urlencode($this->encrypt->encode('kindergarten')));?>">幼兒園組</a></dt>
					<dt><a href="<?php echo base_url("superclps/rank_list_PDF?str=".urlencode($this->encrypt->encode('elementary_low')));?>">國小低年級組</a></dt>
					<dt><a href="<?php echo base_url("superclps/rank_list_PDF?str=".urlencode($this->encrypt->encode('elementary_middle')));?>">國小中年級組</a></dt>
					<dt><a href="<?php echo base_url("superclps/rank_list_PDF?str=".urlencode($this->encrypt->encode('elementary_high')));?>">國小高年級組</a></dt>
					<dt><a href="<?php echo base_url("superclps/rank_list_PDF?str=".urlencode($this->encrypt->encode('junior')));?>">國中組</a></dt>
					<dt><a href="<?php echo base_url("superclps/rank_list_PDF?str=".urlencode($this->encrypt->encode('group')));?>">團體組</a></dt>
				</dl>
			<h1 class="first"><a href="<?php echo base_url('superclps/logout');?>">登出</a></h1>
			<?php endif;?>
	</div><!--結尾在main_content.php-->