<div data-role="page" style="font-size:36px">

  <div data-role="header" data-position="fixed">
   <!-- <a href="#" data-role="button">Back</a>-->
    <h1 style="font-size:30px">第四十六屆世界兒童畫展</h1>
  </div><!-- /header -->

  <div data-role="content"> 
		<table data-role="table" id="my-table" data-mode="reflow">
		  <thead>
		    <tr>
		    	<th>參賽狀態</th>
		    	<th>評鑑結果</th>
		      <th>參賽類別</th>
		      <th>畫題</th>
		      <th>姓名</th>
		      <th>年級</th>
		      <th>年齡</th>
		      <th>性別</th>
		      <th>學校</th>
		      <th>地址</th>
		      <th>電話</th>
		      <th>指導老師</th>
		    </tr>
		  </thead>
		  <tbody>
		    <tr>
		    	<th><?php echo $item_status;?></th>
		    	<th><?php echo $rank;?></th>
		      <td><?php echo $type;?></td>
		      <td><?php echo $title;?></td>
		      <td><?php echo $name;?></td>
		      <td><?php echo $grade."(".$class_note.")";?></td>
		      <td><?php echo $year;?></td>
		      <td><?php echo $sex;?></td>
		      <td><?php echo $city.$school_name;?></td>
		      <td><?php echo $address;?></td>
		      <td><?php echo $phone;?></td>
		      <td><?php echo $teacher."老師";?></td>
		    </tr>
		    </tbody>
		</table>
	<?php if($item_status != "未收件" and $rank != "特優"):?>
	<a href="<?php echo base_url('childart46/item?eval_ctrl='.urlencode($this->encrypt->encode('特優'))."&ssid=".urlencode($ssid));?>" data-role="button" data-icon="delete" >特優</a>
	<?php endif;?>
	<?php if($item_status!="未收件" and $rank != "優選"):?>
	<a href="<?php echo base_url('childart46/item?eval_ctrl='.urlencode($this->encrypt->encode('優選'))."&ssid=".urlencode($ssid));?>" data-role="button" data-icon="delete">優選</a>
	<?php endif;?>
	<?php if($item_status!="未收件" and $rank != "佳作"):?>
	<a href="<?php echo base_url('childart46/item?eval_ctrl='.urlencode($this->encrypt->encode('佳作'))."&ssid=".urlencode($ssid));?>" data-role="button" data-icon="delete">佳作</a>
	<?php endif;?>
	<?php if($item_status=="未收件"):?>
	<button data-role="button" data-icon="delete">尚未收件，無法操作。</button>
	<?php endif;?>
	<?php if($item_status!="未收件"):?>
	<a href="<?php echo base_url('childart46/item?eval_ctrl='.urlencode($this->encrypt->encode('解除評鑑'))."&ssid=".urlencode($ssid));?>" data-role="button" data-icon="delete">解除評鑑</a>
	<?php endif;?>


<!--  <div data-role="footer" data-position="fixed">
    <div data-role="navbar">
      <ul>
        <li><a href="#" data-icon="gear" class="ui-btn-active ui-state-persist">Button 1</a></li>
        <li><a href="#" data-icon="refresh">Button 2</a></li>
        <li><a href="#" data-icon="check">Button 3</a></li>
      </ul>
    </div>
  </div>-->

</div><!-- /page -->
<?php if($alert !=""):?>
<Script>alert('<?php echo $alert;?>');</Script>
<?php endif;?>