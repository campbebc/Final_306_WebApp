<?php
//connects to server
include 'server_connection.php';

//*****
$session=$_POST['session'];
$post=str_replace("'","",$_POST['one']);//sets variable to post values and strips single quotation
$post=str_replace("[","",$post);//strips bracket
$post=str_replace("]","",$post);//strips bracket
$post=str_replace(" ","",$post);//strips spaces
$dataset = explode(",",$post);//creates array of each data
//print_r($dataset); // test prints dataset

foreach($dataset as $activity) {//runs loop for each activity data
//inserts file path into data table of Music Database
$sql="INSERT INTO `data` (`id`,`user`,`activity`) VALUES ('','".addslashes($session)."','".addslashes($activity)."')";//sql to insert into db

$result = mysql_query($sql);//run SQL to DB

if (!mysql_error()){// if no errors in mysql query
  echo "Activity entered (".$activity.") ";
}else//if errors say so and tell error
{
  echo "Problem uploading dataset. Error: ".mysql_error();
  die;
}
}//end for each data

?>


