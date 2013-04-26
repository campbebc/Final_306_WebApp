<?php
include 'server_connection.php';

$songID = $_GET['ID'];

$Query = "UPDATE `MusicDB` SET `Status` = '1' WHERE `ID` ='$songID'"; 

//echo ("The Query is : <br>$Query<p>\n"); 

if (mysql_query($Query)) { 
$_SESSION['msg'] ="Succesfully Deleted";
header( "Location: Songs1.php");
}
else{
$_SESSION['msg'] = "ERROR Deleting Song. Please try again..";
}
?> 

