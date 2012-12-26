<?php
include '../include/config.php';

/**
 * Validating Email Address
 */
if(!empty($_REQUEST['email'])){
	$email = $_REQUEST['email'];
	$query_email = "SELECT user_id FROM users WHERE email = '$email'";
	$chk_email = mysql_query($query_email);
	//$rc = mysql_affected_rows();
	if(mysql_num_rows($chk_email)) {
		print "<div class='field-error' id='field-error-email'>Email Address is not available, Please choose another Email Address.</div>";
	}
	else{
		if(!preg_match("/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i", $email, $match))
		print "<div class='field-error' id='field-error-email'>Invalid Email Address.</div>";
	}
}
else{
	print "<div class='field-error' id='field-error-email'>Email Address is a required field.</div>";
}
?>