<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Party Playlist</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">

<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

<link href="css/prettyPhoto.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" id="camera-css"  href="css/camera.css" type="text/css" media="all">
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/theme.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="css/skins/tango/skin.css" />
<link href="css/bootstrap-responsive.css" rel="stylesheet">
<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->    
</head>
<body>
<!--header-->
     <div class="header">
    <div class="wrap">
        <div class="navbar navbar_ clearfix">
            <div class="container">
                    <div class="row">
                        <div class="span4">
                        <div class="logo"><a href="Bootstrap0.php"><img src="img/logo.png" alt="" /></a></div>                        
                        </div>
                        <div class="span8">
                            <div class="clear"></div>
                            <nav id="main_menu">
                                <div class="menu_wrap">
                                    <ul class="nav sf-menu">
                                      <li class="current"><a href="Bootstrap0.php">Login</a></li>
                                      <li><a href="about.html">About</a></li>
                                    </ul>
                                </div>
                             </nav>                            
                        </div>
                    </div>                
                </div>
             </div>
        </div>    
    </div>
    <!--//header-->    
     
    <!--page_container-->
    <div class="page_container">
        <!--slider-->
        <div id="main_slider">
            <div class="camera_wrap" id="camera_wrap_1">
                <div data-src="img/dj.png"></div>
                <div data-src="img/dj2.png"></div>
                <div data-src="img/dj5.png"></div>                                     
            </div><!-- #camera_wrap_1 -->
            <div class="clear"></div>	
        </div>        
        <!--//slider-->
       
        <!--Welcome-->
        <div class="wrap block">
            <div class="container welcome_block">
            <div class="welcome_line welcome_t"></div>
            Please sign in to view an event<br/>
	<span style="color:red"><?php echo $_GET['error'];?></span>
            <br></br>
		<form name="form1" method="post" action="checklogin.php">
            <input name="myusername" type="text" id="myusername" placeholder="username" value=""><br>
            <input name="mypassword" type="password" id="mypassword" placeholder="password" value=""><br>
	<button method="link" action="checklogin.php" type="submit" class="btn" data-toggle="button">Submit</button>
		</form>
                <div class="welcome_line welcome_b"></div>
            </div>
        </div>
        <!--//Welcome-->         
        
        <div class="footer_bottom">
            <div class="wrap">
            <div class="container">
                <div class="row">
                <div class="span5">
                        <div class="foot_logo"><a href="Bootstrap0.php"><img src="img/logo.png" alt="" /></a></div>    
                        <div class="copyright">&copy; Party Playlist. James Madison University 2013. All Rights Reserved.</div>                        
                        </div>
                        
                                <div class="clear"></div>
                            
                            <div class="clear"></div>
                            <div class="foot_menu">
                           
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
    <script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
    <script type="text/javascript" src="js/jquery.mobile.customized.min.js"></script>
    <script type="text/javascript" src="js/camera.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/superfish.js"></script>
    <script type="text/javascript" src="js/jquery.prettyPhoto.js"></script>
    <script type="text/javascript" src="js/jquery.jcarousel.js"></script>
    <script type="text/javascript" src="js/jquery.tweet.js"></script>
    <script type="text/javascript" src="js/myscript.js"></script>
    <script type="text/javascript">
$(document).ready(function(){	
//Slider
$('#camera_wrap_1').camera();
//Featured works & latest posts
$('#mycarousel, #mycarousel2, #newscarousel').jcarousel();	
});	
</script>
</body>
</html>

