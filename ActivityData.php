<?php
include 'server_connection.php';
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); 
header("Cache-Control: no-store, no-cache, must-revalidate"); 
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

//DATA SESSION DO NOT DELETE!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if(isset($_GET['session'])){
$session=urldecode($_GET['session']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Party Playlist | Activity Data</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script src="http://code.highcharts.com/highcharts.js"></script>
<script src="http://code.highcharts.com/modules/exporting.js"></script>
<link href="css/prettyPhoto.css" rel="stylesheet" type="text/css" />
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/theme.css" rel="stylesheet">
<link href="css/bootstrap-responsive.css" rel="stylesheet">
<link href="css/docs.css" rel="stylesheet">
<link href="js/google-code-prettify/prettify.css" rel="stylesheet">

<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,600' rel='stylesheet' type='text/css'>

<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->    
</head>
<body>
<!--header-->
<?php require "inc/header.php";?>
<!--header-->
<?php 
if(isset($session)){?>

    <!--page_container-->
    <div class="page_container">
<?php
$sql = "SELECT * FROM `data` ORDER BY `id` ASC";
$result = mysql_query($sql);
if(mysql_num_rows($result)>=1){
while($row = mysql_fetch_array($result)){
$times[]=$row['user'];

}
}
$times=array_unique($times);
$times=array_values($times);
echo '<select id="session" name="session">';
foreach($times as $time){
	echo "<option value=\"".urlencode($time)."\">".date('m/d/Y g:i:s a',strtotime($time))."</option> /n";
	}
echo '</select>'
?>
<div id="graphDiv" style="min-width: 400px; height: 500px; margin: 0 auto"></div>	
<script>
jQuery( document ).ready( function( $ ) {
$(function () {
$('#graphDiv').highcharts({
chart: {
type: 'line',
marginRight: 130,
marginBottom: 50
},
title: {
text: 'Activity Data',
x: -20 //center
},
xAxis: {
            
            labels: {
                enabled: false
            }
        },
yAxis: {
title: {
text: 'Activity Level'
},
plotLines: [{
value: 0,
width: 1,
color: '#808080'
}]
},
legend: {
layout: 'vertical',
align: 'right',
verticalAlign: 'top',
x: -10,
y: 100,
borderWidth: 1
},
series: [{
data: [
<?php 
$sql = "SELECT * FROM `data` WHERE `user`='".$session."' AND `activity`!='' ORDER BY `id` ASC";
$result = mysql_query($sql);
if(mysql_num_rows($result)>=1){
while($row = mysql_fetch_array($result)){
$data.= "['".date('m/d/Y g:i:s a',strtotime($row['user']))."',".$row['activity']."],";
}
echo substr($data, 0, -1);
}
?>
]
}]
});
});
});
    </script>
</div>
    <!--//page_container-->
    <?php 
}else{/////IF DATA session not set ?>
    <div class="page_container">
<?php
$sql = "SELECT * FROM `data` ORDER BY `id` ASC";
$result = mysql_query($sql);
if(mysql_num_rows($result)>=1){
while($row = mysql_fetch_array($result)){
$times[]=$row['user'];

}
}
$times=array_unique($times);
$times=array_values($times);
echo '<select id="session" name="session">';
foreach($times as $time){
	echo "<option value=\"".urlencode($time)."\">".date('m/d/Y g:i:s a',strtotime($time))."</option> /n";
	}
echo '</select>'
?>
</div>
<?php }?>
    <!--footer-->
     <div class="footer_bottom">
            <div class="wrap">
            <div class="container">
                <div class="row">
                <div class="span5">
                        <div class="foot_logo"><a href="Songs1.php"><img src="img/logo.png" alt="" /></a></div>    
                        <div class="copyright">&copy; Party Playlist. James Madison University 2013. All Rights Reserved.</div>                        
                        </div>
                        
                                <div class="clear"></div>
                            
                            <div class="clear"></div>
                            <div class="foot_menu">
                            <ul>
                                        <li><a href="Songs1.php">Songs</a></li>
                                        <li><a href="Queue.php">Queue</a></li>
                                        <li class="current"><a href="ActivityData.php">Activity Data</a></li>
                                    </ul>
                            </div>
                            </div>                            
                        </div>
                    </div>	
                </div>
            </div>
        </div>
    </div>
    <!--//footer-->  
    
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script src="js/google-code-prettify/prettify.js"></script>
    <script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/superfish.js"></script>
    <script type="text/javascript" src="js/jquery.tweet.js"></script>
    <script type="text/javascript" src="js/jquery.prettyPhoto.js"></script>
    <script type="text/javascript" src="js/myscript.js"></script>    
    <script src="js/application.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$('#session').change(function(){
			var value = $('#session').val();
			window.location.replace('ActivityData.php?session='+value)
		});
	});
	</script>
</body>
</html>

