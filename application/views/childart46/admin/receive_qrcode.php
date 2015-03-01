	<div class="main-content">
		<!-- Pagetitle -->
		<h1 class="pagetitle">收件用QR-CODE</h1>
				<FORM action="<?php echo base_url("superclps/receive_qrcode")?>" method="POST" id="create_pdf">
				<table class="table table-striped">
				  <tr>
				  	<td>
				  		<!--<input type="hidden" name="control_dns" value="<?php echo base_url("/blog/")?>">-->
				  		<label class="control-label" for="name">1.聯絡人</label>
				  		<input type="text" class="form-control" id="name" name="name">
				  	</td>
				  </tr>
				  <tr>
				  	<td>
				  		<label class="control-label" for="phone">2.聯絡電話</label>
				  		<input type="text" class="form-control" id="phone" name="phone">
				  	</td>
				  </tr>
				  <tr>
				  	<td>
				  		<input type="submit"  class="btn btn-default" id="submit" name="submit" value="送出">			  		
				  	</td>
				  </tr>
				 </FORM>
				  <?php if($name!="" and $phone!=""):?>
				  <tr>
				  	<td>
				  		<label class="control-label" for="phone"><?php echo $name."-".$phone;?></label>
				  		<img src="https://api.qrserver.com/v1/create-qr-code/?size=150x1050&data=<?php echo urlencode($url)?>" height="250" width="250">
				  	</td>
				  </tr>
				  <tr>
				  	<td>
				  		<label class="control-label" for="phone">下載送件清冊</label>
				  		<?php for($i=0 ; $i < count($date) ; $i++ ):?>
				  		<FORM action="<?php echo base_url("superclps/receive_list")?>" method="POST" id="create_pdf">
				  			<input type="hidden" name="content_name" value="<?php echo $name;?>">
				  			<input type="hidden" name="content_phone" value="<?php echo $phone;?>">
				  			<input type="hidden" name="date" value="<?php echo $date[$i]['date'];?>">
				  			<input type="submit" value="下載<?php echo $date[$i]['date'];?>清單" class="btn btn-danger">
				  		</FORM>
				  		<?php endfor;?>
				  	</td>
				  </tr>				  
				  <?php endif;?>
				</table>
				
	</div>
<script>
$(function(){
	$('body,html').animate({scrollTop:245},600);
	$("#create_pdf").validate({
		rules: {
			name: {
				required: true,
				minlength: 2
			},
			phone: {
				required: true,
				maxlength:15,
				minlength:7
			}
		},
		messages: {
			name: {
				required: "<font color='red'>請輸入姓名</font>",
				minlength: "<font color='red'>您所輸入的姓名過短</font>",
			},
			phone: {
				required: "<font color='red'>請輸入電話</font>",
				max:"<font color='red'>電話太長了</font>",
				min:"<font color='red'>電話太短了</font>"
			}
		}
	});
});
</script>