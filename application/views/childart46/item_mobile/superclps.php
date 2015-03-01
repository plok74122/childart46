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
	<?php if($item_status=="未收件"):?>
	<a href="<?php echo base_url('childart46/item?dbctrl='.urlencode($this->encrypt->encode('insert'))."&ssid=".urlencode($ssid));?>" data-role="button" data-icon="delete" >收件</a>
	<a href="<?php echo base_url('childart46/item?dbctrl='.urlencode($this->encrypt->encode('enforcement_insert'))."&ssid=".urlencode($ssid));?>" data-role="button" data-icon="delete">*****強制進件*****</a>
	<?php else:?>
	<a href="<?php echo base_url('childart46/item?dbctrl='.urlencode($this->encrypt->encode('delete'))."&ssid=".urlencode($ssid));?>" data-role="button" data-icon="delete">退件</a>
	<?php endif;?>


</div><!-- /page -->
<?php if($alert !=""):?>
<Script>alert('<?php echo $alert;?>');</Script>
<?php endif;?>