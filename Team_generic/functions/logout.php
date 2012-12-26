<?php
session_start();

include '../include/config.php'; 
$logout_time=strtotime('now');
echo $logout_time;
//$logout_qry="UPDATE users SET sid = 0, logout_time = '$logout_time' WHERE sid = '$_SESSION[sid]'";
$logout_qry="UPDATE users SET sid = 0, logout_time = '".$logout_time."' WHERE user_id = '".$_SESSION['user_id']."'";
mysql_query($logout_qry);
session_destroy();
header("Location: $config->base_url/homepage.php");
?>