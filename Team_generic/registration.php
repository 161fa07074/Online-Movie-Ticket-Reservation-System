<?php 
	session_start(); 
	include './include/config.php'; 
	$path = $config->base_url.'/homepage.php';
	$signin = $config->base_url.'/login.php#wrapper';
	$signup = $config->base_url.'/registration.php#wrapper';
	if(isset($_SESSION['sid'])){		
		header("Location: $path");
	}
?>
<!DOCTYPE html> 
<html lang="en">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" href="./bootstrap-master/docs/assets/css/bootstrap.css">
 <link rel="stylesheet" href="./bootstrap-master/docs/assets/css/bootstrap-responsive.css">
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <link rel="shortcut icon" href="./images/favicon.ico"/>
 <title>NITK OnLine MovieTicket Booking</title>
 <link rel="stylesheet" type="text/css" href="./css/style.css" />
 <link rel="stylesheet" type="text/css" href="./css/banner.css" />
 <script type='text/javascript' src="./js/jquery.js" ></script>
 <script type='text/javascript' src="./js/validation.js" ></script>
 <script type='text/javascript' src="./js/jquery.min.js"></script>
 <script type='text/javascript' src="./js/book_myshow.js" ></script> 
 <script type='text/javascript' src="./js/banner.js" ></script>
 <script type='text/javascript' src="./js/slides.min.jquery.js"></script> 
</head>

<body id='registration-page'>

<div class="mainWrapper">
<div><div class="header-title"><a title='Book Tickets' href="<?php echo $path; ?>">NITK Online Movie Ticket Booking</a></div>
	<div class="userWelcome">
		<?php 
			echo "<a class='homepage-sign-in' href='".$signin."'>Sign In</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a class='homepage-sign-in' href='".$signup."'>Sign Up&nbsp;&nbsp;</a>";
		?>
	</div>
</div>

<div class="main" style="margin-top:30px;">
	<div id="example">			
		<div id="slides">
			<div class="slides_container">
				<?php
					$sel_movies = "SELECT movie_id, movie_name, movie_poster FROM movies";
					$sel_movies_qry = mysql_query($sel_movies);
					while($sel_movies_qry_row = mysql_fetch_object($sel_movies_qry)){	
						echo "<div class='slide'>";
						echo "<a href='movie-details.php?id=".$sel_movies_qry_row->movie_id."' title='".$sel_movies_qry_row->movie_name."' ><img class='slider-image' src='./images/".$sel_movies_qry_row->movie_poster."'></a>";
						echo "</div>";
					}
				?>
			</div>		
		</div>	
	</div>
</div>

<div class="content" style="margin-top:30px;">

<div id='register-signin'>
	<span>
		<?php include './include/config.php'; ?>
		<a href="<?php echo $signin; ?>">Sign In</a>
	</span>
</div>

	<form id='wrapper' action='./functions/registration_submit.php' method='post'>
		<fieldset>
			<legend>Sign Up</legend>
				<label for='user_name' >User Name<span class='field-required'> *</span>:
				<input type='text' name='user_name' id='username' maxlength="50" />
				</label>
				<br/>
				<!--<div class='field-error' id='field-error-username'>User name should contain min 4, max 20 characters and may contain a-z, A-Z, 0-9, _</div>-->
				<div class='field-error' id='field-error-username'></div>

				<label for='password' >Password<span class='field-required'> *</span>:
				<input type='password' name='password' id='password' maxlength="50" />
				</label>
				<br/>
				<!--<div class='field-error' id='field-error-password'>Password Don't Match.</div>-->

				<label for='confirm-password' >Confirm Password<span class='field-required'> *</span>:
				<input type='password' name='confirm-password' id='confirm-password' maxlength="50" />
				</label>
				<br/>
				<div class='field-error' id='field-error-confirm-password'>Password and Confirm Password Don't Match.</div>

				<label for='first_name' >Frist Name<span class='field-required'> *</span>: 
				<input type='text' name='first_name' id='firstname' maxlength="50" />
				</label>
				<br/>
				<div class='field-error' id='field-error-firstname'>Frist Name should contain min 4, max 20 characters and may contain a-z, A-Z, 0-9, _</div>

				<label for='last_name' >last Name<span class='field-required'> *</span>: 
				<input type='text' name='last_name' id='lastname' maxlength="50" />
				</label>
				<br/>
				<div class='field-error' id='field-error-lastname'>last Name should contain min 4, max 20 characters and may contain a-z, A-Z, 0-9, _</div>

				<label for='email' >Email Address<span class='field-required'> *</span>:
				<input type='text' name='email' id='email' maxlength="50" />
				</label>
				<br/>
				<!--<div class='field-error' id='field-error-email'>Invalid Email Address.</div>-->
				<div class='field-error' id='field-error-email'></div>

				<label for='address' >Address:
				<textarea cols='21' name='address' id='address' maxlength="50" ></textarea>
				</label>
				<br/>
				<br/>
				<div class='field-error' id='field-error-address'>Address should contain min 10, max 40 characters and may contain a-z, A-Z, 0-9, _</div>

				<label for='mobileno' >Mobile No<span class='field-required'> *</span>:
				+91
				<input type='text' name='mobileno' id='mobileno' maxlength="10" />
				</label>
				&nbsp;&nbsp;<br/>
				<div class='field-error' id='field-error-mobileno'>Enter a valid 10 digits Mobile No.</div>

				<?php /*include './functions/birth.php' ;*/ ?><br/><br/>

				<input type='submit' id='sumit_reg_form' name='Submit' value='Sign Up'/>
		</fieldset>
	</form>
</div>

<div class="footer-div"><p class="footer-bottom"> <a title="NITK Online Movie Ticket Booking" href="<?php echo $path;?>"> &copy;2012 NITK Online Movie Ticket Booking.</a></p></div>
</body>
</html>