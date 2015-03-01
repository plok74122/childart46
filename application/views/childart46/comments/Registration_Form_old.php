	<div class="main-content">
		<!-- Pagetitle -->
		<h1 class="pagetitle">創建您的報名表</h1>
				<table class="table table-striped">
				  <tr>
				  	<td>
				  		<FORM action="<?php echo base_url("blog/Registration_Form_PDF")?>" method="POST" id="create_pdf">
				  		<input type="hidden" name="control_dns" value="<?php echo base_url("/blog/")?>">
				  		<label class="control-label" for="username">1.作者姓名(團體組請以、分隔 例：王小明、陳小美、丁小華)</label>
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
				  		<label class="control-label" for="selectclass">3.參賽組別</label>
				  		<select  class="form-control" id="selectclass" name="selectclass">
				  		</select>
				  	</td>
				  </tr>
				  <tr>
				  	<td>
				  		<label class="control-label" for="school">4.學校名稱(例：中壢國小、中壢國中、中壢幼兒園)</label>
				  		<input type="text" class="form-control" id="school" name="school">
				  	</td>
				  </tr>
				  <tr>
				  	<td>
				  		<label class="control-label" for="grade">5.年級</label>
				  		<select class="form-control" id="grade" name="grade">
				  		</select>
				  	</td>
				  </tr>
				  <tr>
				  	<td>
				  		<label class="control-label" for="teacher">6.指導老師(選填)</label>
				  		<input type="text" class="form-control" id="teacher" name="teacher">
				  		</FORM>
				  	</td>
				  </tr>
				  <tr>
				  	<td>
				  		<button  class="btn btn-default" id="submit" name="submit">產生報名表</button>
				  	</td>
				  </tr>
				</table>
	</div>

<script>
$(function(){
	$.ajax({
		url:"<?php echo base_url("/blog/ajax_class_one");?>",
		success:function(respones){
			var obj=$.parseJSON(respones);
			$('#selectclass').empty();
			$('#selectclass').append($("<option></option>").attr("value", '').text(''));
			for(var i =0 ; i < obj.length ; i++)
			{
				$('#selectclass').append($("<option></option>").attr("value", obj[i].class).text(obj[i].class_note));
			}
		}
	});	
	$('#selectclass').change(function(){
		$.ajax({
			url:"<?php echo base_url("/blog/ajax_class");?>",
			type:"post",
			data:({'class': $('#selectclass').val()}),
			success:function(respones){
				var obj=$.parseJSON(respones);
				$('#grade').empty();
				$('#grade').append($("<option></option>").attr("value", '').text(''));
				for(var i =0 ; i < obj.length ; i++)
				{
					$('#grade').append($("<option></option>").attr("value", obj[i].grade).text(obj[i].grade));
				}
			}
		});
	});
	$("#submit").click(function(){
		var username = $('#username').val();
		var title = $('#title').val();
		var selectclass = $('#selectclass').val();
		var school = $('#school').val();
		var grade = $('#grade').val();
		var teacher = $('#teacher').val();
		if(!username){$('label:eq(0)').html("1.作者姓名<span class='glyphicon glyphicon-remove form-control-feedback'></span>");}else{$('label:eq(0)').html("1.作者姓名");}
		if(!title){$('label:eq(1)').html("2.作品名稱<span class='glyphicon glyphicon-remove form-control-feedback'></span>");}else{$('label:eq(1)').html("2.作品名稱");}
		if(!selectclass){$('label:eq(2)').html("3.參賽組別<span class='glyphicon glyphicon-remove form-control-feedback'></span>");}else{$('label:eq(2)').html("3.參賽組別");}
		if(!school){$('label:eq(3)').html("4.學校名稱(例：中壢國小、中壢國中、中壢幼兒園)<span class='glyphicon glyphicon-remove form-control-feedback'></span>");}else{$('label:eq(3)').html("4.學校名稱(例：中壢國小、中壢國中、中壢幼兒園)");}
		if(!grade){$('label:eq(4)').html("5.年級<span class='glyphicon glyphicon-remove form-control-feedback'></span>");}else{$('label:eq(4)').html("5.年級");}
		if(username && title && selectclass && school && grade)
		{
			if(!teacher){$('#teacher').attr("value","無");}
			$('#create_pdf').submit();
		}
	});
});
</script>