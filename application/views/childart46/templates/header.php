<?php
	$times=mktime(8,0,0,4,13,2015);
	$time1=mktime(16,0,0,4,15,2015);
	$time2=mktime(8,0,0,4,18,2015);
	$time3=mktime(15,0,0,4,18,2015);
	$time =time();
?>
<title>桃園市第四十六屆世界兒童畫展</title>
<!-- Global IE fix to avoid layout crash when single word size wider than column width -->
<!--[if IE]><style type="text/css"> body {word-wrap: break-word;}</style><![endif]-->
<body>
	<!-- Main Page Container -->
	<div class="page-container">

   <!-- For alternative headers START PASTE here -->

    <!-- A. HEADER -->      
    <div class="header">
      
      <!-- A.1 HEADER TOP -->
      <div class="header-top">
        
        <!-- Sitelogo and sitename -->
        <a class="sitelogo" href="<?php echo base_url('');?>" title="前往首頁"></a>
        <div class="sitename">
          <h1 style="font-size: 202%;"><a href="<?php echo base_url();?>" title="前往首頁">桃園市第四十六屆世界兒童畫展</a></h1>
        </div>
    
        <!-- Navigation Level 0 -->
<!--        <div class="nav0">
         <ul>
            <li><a href="#" title="Pagina home in Italiano"><img src="{img_local}/flag_italy.gif" alt="Image description" /></a></li>
            <li><a href="#" title="Homepage auf Deutsch"><img src="{img_local}/flag_germany.gif" alt="Image description" /></a></li>
            <li><a href="#" title="Hemsidan p&aring; svenska"><img src="{img_local}/flag_sweden.gif" alt="Image description" /></a></li>
          </ul>
        </div>		-->	

        <!-- Navigation Level 1 -->
<!--        <div class="nav1">
          <ul>
            <li><a href="#" title="Go to Start page">首頁</a></li>
            <li><a href="#" title="Get to know who we are">關於我</a></li>
            <li><a href="#" title="Get in touch with us">聯繫我</a></li>																		
            <li><a href="#" title="Get an overview of website">友情連結</a></li>
          </ul>
        </div>   -->           
      </div>
      
      <!-- A.2 HEADER MIDDLE -->
      <div class="header-middle"> 
				<!-- Countdown dashboard start -->
				<div id="countdown_dashboard">
		      <div class="sitemessage">
		      	<?php if($times >=  $time):?>
		        <h1>開始收件</h1>		      	
		      	<?php elseif($time1 >=  $time):?>
		        <h1>截止收件</h1>
		        <?php elseif($time2 >= $time):?>
		        <h1>開始評選</h1>
		        <?php elseif($time3 >= $time):?>
		        <h1>公布成績</h1>
		        <?php else:?>
		        <h1>比賽結束</h1>
		        <?php endif;?>
		      </div>   
					<div class="dash weeks_dash">
						<span class="dash_title">周</span>
						<div class="digit">0</div>
						<div class="digit">0</div>
					</div>
		
					<div class="dash days_dash">
						<span class="dash_title">日</span>
						<div class="digit">0</div>
						<div class="digit">0</div>
					</div>
		
					<div class="dash hours_dash">
						<span class="dash_title">時</span>
						<div class="digit">0</div>
						<div class="digit">0</div>
					</div>
		
					<div class="dash minutes_dash">
						<span class="dash_title">分</span>
						<div class="digit">0</div>
						<div class="digit">0</div>
					</div>
		
					<div class="dash seconds_dash">
						<span class="dash_title">秒</span>
						<div class="digit">0</div>
						<div class="digit">0</div>
					</div>
				</div>
				
				<!-- Countdown dashboard end -->
        <!-- Site message -->
     
      </div>
   </div>
<!--page_container的結尾在footer-->

		<script language="javascript" type="text/javascript">
			jQuery(document).ready(function() {
				$('#countdown_dashboard').countDown({
					targetDate: {
					<?php if($times >=  $time):?>
						'day': 		13,
						'month': 	4,
						'year': 	2015,
						'hour': 	8,
						'min': 		0,
						'sec': 		0					
					<?php elseif($time1 >=  $time):?>
						'day': 		15,
						'month': 	4,
						'year': 	2015,
						'hour': 	16,
						'min': 		0,
						'sec': 		0
					<?php elseif($time2 >=  $time):?>
						'day': 		18,
						'month': 	4,
						'year': 	2015,
						'hour': 	8,
						'min': 		0,
						'sec': 		0		
					<?php elseif($time3 >=  $time):?>
						'day': 		18,
						'month': 	4,
						'year': 	2015,
						'hour': 	15,
						'min': 		0,
						'sec': 		0	
		       <?php else:?>
						'day': 		18,
						'month': 	4,
						'year': 	2014,
						'hour': 	15,
						'min': 		0,
						'sec': 		0	
		       <?php endif;?>				
					}
				});
			});
		</script>