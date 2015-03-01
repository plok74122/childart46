<div data-role="page">

  <div data-role="header" data-position="fixed">
   <!-- <a href="#" data-role="button">Back</a>-->
    <h1>第四十六屆世界兒童畫展</h1>
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



  </div><!-- /content -->

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