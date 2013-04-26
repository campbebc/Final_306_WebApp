<?php
session_start();
ini_set('error_reporting', E_ALL);
if(session_is_registered('myusername')){1==1;}
else{header('Location: Bootstrap0.php');}

//Connect to server and database

$db_host = "localhost";
$db_username = "root";
$db_pass = "checkout";
$db_name = "Music Database";

//changed "mysql_error()" if something's not working try deleting this
@mysql_connect("$db_host","$db_username","$db_pass") or die (mysql_error());
@mysql_select_db("$db_name") or die (mysql_error());
//print_r($_SESSION);
?>
