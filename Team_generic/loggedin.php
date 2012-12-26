<?php
session_start(); 
include './include/config.php'; 
$path = $config->base_url.'/homepage.php';
if(!isset($_SESSION['sid']) || empty($_POST)){	
	header("Location: $path");
}
$qry = "SELECT * FROM users WHERE user_name = '$_POST[username]' AND password = md5('$_POST[password]')"; 
$result = mysql_query($qry);

if(mysql_num_rows($result)) {
	$_SESSION['sid']=session_id();
	$login_time=strtotime('now');
	$member=mysql_fetch_assoc($result);
	$_SESSION['name'] = $member['first_name'];
	$_SESSION['user_id'] = $member['user_id'];

	if(isset($_SESSION['sid'])){
		if($member['sid'] == 0){
			$sid_insert = "UPDATE users SET sid = '$_SESSION[sid]', login_time = '$login_time' WHERE user_name = '$_POST[username]'";
			$result1 = mysql_query($sid_insert);
		}
	}
}
else {
	echo "username or password incorrect";
	//header("Location: $config->base_url/login.php");
}
	

if(isset($_SESSION['sid'])){ 
	echo "<div style='float:right;' >";
		echo "<a href=$config->base_url/functions/logout.php>LogOut</a>";
	echo "</div>";
} 

?> 
