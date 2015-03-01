<div class="main">
	<div class="main-navigation">
		<div class="round-border-topright"></div>
			<?php if($this->session->userdata('admin')==""):?>
			<h1 class="first">登入</h1>
				<form action="<?php echo base_url('superclps/login_check');?>" method="post">
				帳號：<input type="text" name="account" id="account" class="form-control">	
				密碼：<input type="password" name="password" id="password" class="form-control">
				<input type="submit" value="送出" class="btn btn-success">
				</form>
			<?php else:?>
			<h1 class="first">比賽資訊</h1>
				<!-- Navigation with grid style -->
				<dl class="nav3-grid">
					<dt><a href="<?php echo base_url("/childart46/Registration_Form");?>">創建您的報名表</a></dt>
					<dt><a href="<?php echo base_url("");?>">比賽規則</a></dt>
					<dt><a href="<?php echo base_url("");?>">關於世界兒童畫展</a></dt>
				</dl>
			<h1 class="first">參賽狀況</h1>
				<dl class="nav3-grid">
					<dt><a href="<?php echo base_url("childart46/statistics?group=".urlencode($this->encrypt->encode('kindergarten')));?>">幼兒園組</a></dt>
					<dt><a href="<?php echo base_url("childart46/statistics?group=".urlencode($this->encrypt->encode('elementary_low')));?>">國小低年級組</a></dt>
					<dt><a href="<?php echo base_url("childart46/statistics?group=".urlencode($this->encrypt->encode('elementary_middle')));?>">國小中年級組</a></dt>
					<dt><a href="<?php echo base_url("childart46/statistics?group=".urlencode($this->encrypt->encode('elementary_high')));?>">國小高年級組</a></dt>
					<dt><a href="<?php echo base_url("childart46/statistics?group=".urlencode($this->encrypt->encode('junior')));?>">國中組</a></dt>
					<dt><a href="<?php echo base_url("childart46/statistics?group=".urlencode($this->encrypt->encode('group')));?>">團體組</a></dt>
				</dl>
			<h1 class="first">獲獎名單</h1>
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