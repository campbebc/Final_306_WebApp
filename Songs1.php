<?php
include 'server_connection.php';
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); 
header("Cache-Control: no-store, no-cache, must-revalidate"); 
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Party Playlist | Songs</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
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
        
    <!--page_container-->
<h4>Add a new entry by entering song name and artist!</h4>
<?php if(isset($_SESSION['msg'])){echo "<h5 id=\"msg\">".$_SESSION['msg']."</h5>";unset($_SESSION['msg']);}?>
<form action="insert.php" method="post">
<input type="text" name="newsong" placeholder="Song Name">
<input type="text" name="newartist" placeholder="Artist">
<input type="submit" class="btn" data-toggle="button" value="Submit" name="submit" action="insert.php">
</form>

<table class="table table-striped table-hover table-bordered">
<th>Song Name</th>
<th>Artist</th>
<th>Delete Song</th>
<?php
// Create connection

$con=mysqli_connect("localhost","root","checkout","Music Database");

// Check connection
if (mysqli_connect_errno($con))
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  
$result = mysqli_query($con,"SELECT * FROM MusicDB WHERE Status=0 ORDER BY Song ASC");
 
while($row = mysqli_fetch_array($result))
  {
	echo"<tr><td><a href=https://www.youtube.com/results?hl=en&q=". urlencode($row['Song'] . " " . $row['Artist']).">".$row['Song']."</a></td>";
	echo "<td>".$row['Artist']."</td>";
	echo "<td><a href=\"delete.php?ID=".$row['ID']."\"><img src=\"img/delete.png\"</a></td></tr>";
  }


mysqli_close($con);

?>

</table>

    <!--//page_container-->
    
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
                                        <li><a href="ActivityData.php">Activity Data</a></li>
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
		$('#msg').delay(10000).slideUp();

	});
	</script>
</body>
</html>
