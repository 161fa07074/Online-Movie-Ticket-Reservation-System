<?php
include '../include/config.php';

/**
 * Validating User Name
 */
if(!empty($_REQUEST['username'])){
	$username = $_REQUEST['username'];
	$query_username = "SELECT user_id FROM users WHERE user_name = '$username'";
	$chk_username = mysql_query($query_username);
	//$rc = mysql_affected_rows();
	if(mysql_num_rows($chk_username)) {
		print "<div class='field-error' id='field-error-username'>User Name is not available, Plese choose another User Name.</div>";
		//print "User Name is not available, Plese choose another User Name.";
	}
	else{
		if(!preg_match("/^[A-Za-z0-9_]{4,20}$/", $username, $match))
		print "<div class='field-error' id='field-error-username'>User name should contain min 4, max 20 characters and may contain a-z, A-Z, 0-9, _</div>";
		//print "User name should contain min 4, max 20 characters and may contain a-z, A-Z, 0-9, _";
	}
}
else{
	print "<div class='field-error' id='field-error-username'>User Name is a required field.</div>";
	//print "User Name is a required field.";
}

?>