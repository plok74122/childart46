	<div class="main-content">
		<!-- Pagetitle -->
		<h1 class="pagetitle"><?php echo $class_note[0]['class_note'];?> 獲獎清單</h1>
		<div class="column1-unit">
			<h2><?php echo implode('，',$count);?></h2>
			<table class="table table-striped">
				  <tr>
				  	<td>
				  		學校(年級)
				  	</td>
				  	<td>
				  		姓名
				  	</td>
				  	<td>
				  		作品名稱
				  	</td>
				  	<td>
				  		指導老師
				  	</td>
				  	<td>
				  		備註
				  	</td>
				  </tr>
			<?php for($i=0 ; $i < count($item) ; $i++):?>
				  <tr>
				  	<td>
				  		<?php echo $item[$i]['school_name']."(".$item[$i]['grade'].")";?>
				  	</td>
				  	<td>
				  		<?php echo $item[$i]['name'];?>
				  	</td>
				  	<td>
				  		<?php echo $item[$i]['title'];?>
				  	</td>
				  	<td>
				  		<?php echo $item[$i]['teacher'];?>
				  	</td>
				  	<td>
				  		<?php echo $item[$i]['rank'];?>
				  	</td>
				  </tr>			
			<?php endfor;?>
			</table>       
		</div>
	</div>