<?php
session_start();
$host="localhost"; // 
$username="root"; // 
$password="checkout"; // 
$db_name="Music Database"; //  
$tbl_name="Login"; // Login 
// Connect to server and select databse.

mysql_connect($host, $username, $password)or die("cannot connect"); 
mysql_select_db($db_name)or die("cannot select DB");

// username and password sent from form 

$myusername=$_POST['myusername']; 
$mypassword=$_POST['mypassword']; 

// To protect MySQL injection (more detail about MySQL injection)

$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysql_real_escape_string($myusername);
$mypassword = mysql_real_escape_string($mypassword);
$sql="SELECT * FROM $tbl_name WHERE username='$myusername' and password='$mypassword'";
$result=mysql_query($sql);

// Mysql_num_row is counting table row

$count=mysql_num_rows($result);
// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1){
// Register $myusername, $mypassword and redirect to file "Songs1.php"
$_SESSION['myusername']=$myusername;
header("location:Songs1.php");}
else {

header("location:Bootstrap0.php?error=Incorrect Username or Password");
}

?>


