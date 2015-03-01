	<div class="main-content">
		<!-- Pagetitle -->
		<h1 class="pagetitle">製作中</h1>
				<table class="table table-striped">
				  <tr>
				  	<td>
				  		<FORM action="<?php echo base_url("blog/Report_Form_PDF")?>" method="POST" id="create_pdf">
				  		<label class="control-label" for="username">1.作者姓名</label>
				  		<input type="text" class="form-control" id="username" name="username">
				  	</td>
				  </tr>
				  <tr>
				  	<td>
				  		<label class="control-label" for="title">2.作品名稱</label>
				  		<input type="text" class="form-control" id="title" name="title">
				  	</td>
				  </tr>
				  <tr>
				  	<td>
				  		<label class="control-label" for="school">3.學校名稱</label>
				  		<input type="text" class="form-control" id="school" name="school">
				  	</td>
				  </tr>
				  <tr>
				  	<td>
				  		<label class="control-label" for="school">4.收件日期</label>
				  		<input type="text" class="form-control" id="date" name="date" value="<?php echo date('Y-m-d');?>">
				  	</td>
				  </tr>
				  <tr>
				  	<td>
				  		<label class="control-label" for="teacher">5.指導老師</label>
				  		<input type="text" class="form-control" id="teacher" name="teacher">
				  		</FORM>
				  	</td>
				  </tr>
				  <tr>
				  	<td>
				  		<button  class="btn btn-default" id="submit" name="submit">產生收據</button>
				  	</td>
				  </tr>
				</table>
	</div>

<script>
$(function(){
	$("#submit").click(function(){
//		var username = $('#username').val();
//		var title = $('#title').val();
//		var selectclass = $('#selectclass').val();
//		var school = $('#school').val();
//		var grade = $('#grade').val();
//		var teacher = $('#teacher').val();
//		if(!username){$('label:eq(0)').html("1.作者姓名<span class='glyphicon glyphicon-remove form-control-feedback'></span>");}else{$('label:eq(0)').html("1.作者姓名");}
//		if(!title){$('label:eq(1)').html("2.作品名稱<span class='glyphicon glyphicon-remove form-control-feedback'></span>");}else{$('label:eq(1)').html("2.作品名稱");}
//		if(!selectclass){$('label:eq(2)').html("3.參賽組別<span class='glyphicon glyphicon-remove form-control-feedback'></span>");}else{$('label:eq(2)').html("3.參賽組別");}
//		if(!school){$('label:eq(3)').html("4.學校名稱(例：中壢國小、中壢國中、中壢幼兒園)<span class='glyphicon glyphicon-remove form-control-feedback'></span>");}else{$('label:eq(3)').html("4.學校名稱(例：中壢國小、中壢國中、中壢幼兒園)");}
//		if(!grade){$('label:eq(4)').html("5.年級<span class='glyphicon glyphicon-remove form-control-feedback'></span>");}else{$('label:eq(4)').html("5.年級");}
//		if(username && title && selectclass && school && grade)
//		{
//			if(!teacher){$('#teacher').attr("value","無");}
			$('#create_pdf').submit();
//		}
	});
});
</script>