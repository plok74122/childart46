	<div class="main-content">
		<!-- Pagetitle -->
		<h1 class="pagetitle">創建您的報名表</h1>
				<FORM action="<?php echo base_url("childart46/Registration_Form_PDF")?>" method="POST" id="create_pdf">
				<table class="table table-striped">
				  <tr>
				  	<td>
				  		<!--<input type="hidden" name="control_dns" value="<?php echo base_url("/childart46/")?>">-->
				  		<label class="control-label" for="username">1.作者姓名(團體組請以、分隔 例：王小明、陳小美、丁小華)</label>
				  		<input type="text" class="form-control" id="username" name="username">
				  	</td>
				  </tr>
				  <tr>
				  	<td>
				  		<label class="control-label" for="year">2.年齡(團體組擇一代表)</label>
				  		<input type="number" class="form-control" id="year" name="year">
				  	</td>
				  </tr>
				  <tr>
				  	<td>
				  		<label class="control-label" for="title">3.作品名稱</label>
				  		<input type="text" class="form-control" id="title" name="title">
				  	</td>
				  </tr>
				  <tr>
				  	<td>
				  		<label class="control-label" for="type">4.參賽類別</label>
				  		<select class="form-control" id="type" name="type">
				  		</select>
				  	</td>
				  </tr>				  
				  <tr>
				  	<td>
				  		<label class="control-label" for="selectclass">5.參賽組別</label>
				  		<select  class="form-control" id="selectclass" name="selectclass">
				  		</select>
				  	</td>
				  </tr>
				  <tr>
				  	<td>
				  		<label class="control-label" for="sex">6.性別</label>
					  	<select class="form-control" id="sex" name="sex">
					  		<option></option>
					  		<option value="男">男</option>
					  		<option value="女">女</option>
				  		</select>
				  	</td>
				  </tr>
				  <tr>
				  	<td>
				  		<label class="control-label" for="region">7.鄉鎮市區名稱：</label>
				  		<select class="form-control" id="region" name="region">
				  		</select>
				  	</td>
				  </tr>
				  <tr>
				  	<td>
				  		<label class="control-label" for="school">8.學校：</label>
				  		<select class="form-control" id="school" name="school">
				  		</select>
				  	</td>
				  </tr>
				  <tr>
				  	<td>
				  		<label class="control-label" for="grade">9.年級</label>
				  		<select class="form-control" id="grade" name="grade">
				  		</select>
				  	</td>
				  </tr>
				  <tr>
				  	<td>
				  		<label class="control-label" for="teacher">10.指導老師</label>
				  		<input type="text" class="form-control" id="teacher" name="teacher">
				  		
				  	</td>
				  </tr>
				  <tr>
				  	<td>
				  		<!--<button  class="btn btn-default" id="submit" name="submit">產生報名表</button>-->
				  		<input type="submit"  class="btn btn-default" id="submit" name="submit" value="下載報名表">
				  		
				  	</td>
				  </tr>
				</table>
				</FORM>
	</div>

<script>
$(function(){
	$("#create_pdf").validate({
		rules: {
			username: {
				required: true,
				minlength: 2
			},
			year: {
				required: true,
				number: true,
				max:20,
				min:3
			},
			title: {
				required: true
			},
			selectclass: {
				required: true
			},
			region: {
				required: true
			},
			school: {
				required: true
			},
			grade: {
				required: true
			},
			sex: {
				required: true
			},
			type: {
				required: true
			}			
		},
		messages: {
			username: {
				required: "<font color='red'>請輸入姓名</font>",
				minlength: "<font color='red'>您所輸入的姓名過短</font>",
			},
			year: {
				required: "<font color='red'>請輸入年齡</font>",
				number: "<font color='red'>您所輸入的不是一個數字</font>",
				max:"<font color='red'>超出參賽年齡</font>",
				min:"<font color='red'>低於參賽年齡</font>"
			},
			title: {
				required: "<font color='red'>請輸入作品名稱</font>"
			},
			selectclass: {
				required: "<font color='red'>請選擇參賽組別</font>"
			},
			region: {
				required: "<font color='red'>選取參賽組別->選取此欄位</font>"
			},
			school: {
				required: "<font color='red'>選取參賽組別->鄉鎮市區名稱->選取此欄位</font>"
			},
			grade: {
				required: "<font color='red'>選取參賽組別->選取此欄位</font>"
			},
			sex: {
				required: "<font color='red'>請選取性別</font>"
			},
			type: {
				required: "<font color='red'>請選取參賽類別</font>"
			}
		}
	});
	//初始化組別
	$.ajax({
		url:"<?php echo base_url("/childart46/ajax_class_one");?>",
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
	$.ajax({
		url:"<?php echo base_url("/childart46/ajax_type");?>",
		success:function(respones){
			var obj=$.parseJSON(respones);
			$('#type').empty();
			$('#type').append($("<option></option>").attr("value", '').text(''));
			for(var i =0 ; i < obj.length ; i++)
			{
				$('#type').append($("<option></option>").attr("value", obj[i].type).text(obj[i].type+obj[i].note));
			}
		}
	});	
	//處理選完組別後的動作
	$('#selectclass').change(function(){
		if($('#selectclass').val() == "group")
		{
			$('#sex').val('');
			$('#sex').attr('disabled',true);
		}
		else
		{
			$('#sex').attr('disabled',false);
		}
		$.ajax({
			url:"<?php echo base_url("/childart46/ajax_class");?>",
			type:"post",
			data:({'class': $('#selectclass').val()}),
			success:function(respones){
				var obj=$.parseJSON(respones);
				//清空選單
				$('#grade').empty();
				$('#grade').append($("<option></option>").attr("value", '').text(''));
				for(var i =0 ; i < obj.length ; i++)
				{
					$('#grade').append($("<option></option>").attr("value", obj[i].grade).text(obj[i].grade));
				}
			}
		});
		$.ajax({
			url:"<?php echo base_url("/childart46/ajax_region");?>",
			type:"post",
			data:({'class': $('#selectclass').val()}),
			success:function(respones){
				var obj=$.parseJSON(respones);
				//清空選單
				$('#school').empty();
				$('#region').empty();
				$('#region').append($("<option></option>").attr("value", '').text(''));
				for(var i =0 ; i < obj.length ; i++)
				{
					$('#region').append($("<option></option>").attr("value", obj[i].region).text(obj[i].region));
				}
			}
		});
	});
	//處理選擇地區
	$('#region').change(function(){
		$.ajax({
			url:"<?php echo base_url("/childart46/ajax_school");?>",
			type:"post",
			data:({'class': $('#selectclass').val(),'region': $('#region').val()}),
			success:function(respones){
				var obj=$.parseJSON(respones);
				//清空選單
				$('#school').empty();
				$('#school').append($("<option></option>").attr("value", '').text(''));
				for(var i =0 ; i < obj.length ; i++)
				{
					$('#school').append($("<option></option>").attr("value", obj[i].no).text(obj[i].name));
				}
			}
		});
	});
//	$("#submit").click(function(){
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
//			$('#create_pdf').submit();
//		}
//	});
});
</script>