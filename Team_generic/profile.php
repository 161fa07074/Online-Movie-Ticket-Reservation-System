<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php 
	session_start();
	include './include/config.php'; 
	$path = $config->base_url.'/homepage.php';
	$signout = $config->base_url.'/functions/logout.php';
	$signuser = $config->base_url.'/profile.php';
	$signin = $config->base_url.'/login.php#wrapper';
	$signup = $config->base_url.'/registration.php#wrapper';
	if(!isset($_SESSION['sid'])){		
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
 
 <!--<link rel="stylesheet" type="text/css" href="./css/jquery-ui.css" /> 
 <script type='text/javascript' src="./js/jquery-1.8.2.js"></script>
 <script type='text/javascript' src="./js/jquery-ui.js"></script>-->
 
 <script type='text/javascript' src="./js/jquery.js" ></script>
 <script type='text/javascript' src="./js/jquery.min.js"></script>
 <script type='text/javascript' src="./js/book_myshow.js" ></script> 
 <script type='text/javascript' src="./js/banner.js" ></script>
 <script type='text/javascript' src="./js/profile.js" ></script>
 <script type='text/javascript' src="./js/slides.min.jquery.js"></script>
 
 <!--<script>
    $(function() {
        $( "#accordion" ).accordion({
            collapsible: true
        });
    });
 </script>-->
	
 </head>

<body id='profile-page'>
<?php 
	/*date_default_timezone_set('Asia/Calcutta');
	include './include/config.php';
	
	$sql = "SELECT * FROM users where user_id=".$_SESSION['user_id'];
	$sql_qry=mysql_query($sql);
	$row=mysql_fetch_array($sql_qry);
	
	$username=$row['user_name'];
	$email=$row['email'];
	$firstname=$row['first_name'];
	$lastname=$row['last_name'];
	$address=$row['address'];
	$mob=$row['mobile_number'];
	$email=$row['email'];
*/
?>
	<div class="mainWrapper">
		<div>
			<div class="header-title"><a title='Book Tickets' href="<?php echo $path; ?>">NITK Online Movie Ticket Booking</a></div>
			<div class="userWelcome">
				<?php 
					if(isset($_SESSION['sid'])){
						echo "Welcome : <a class='sign-user' href='".$signuser."'>".$_SESSION['first_name']." ".$_SESSION['last_name']. "</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a class='signout-link' href='".$signout."'>Sign Out&nbsp;&nbsp;</a>";
					}
					else {
						echo "<a class='homepage-sign-in' href='".$signin."'>Sign In&nbsp;&nbsp;</a> | <a class='homepage-sign-in' href='".$signup."'>&nbsp;&nbsp;Sign Up&nbsp;&nbsp;</a>"; 
					}
				?>
			</div>
		</div>

		<div class="content" style="margin-top:30px;">
		<?php 
		$error_class = '';
		$error ='';
		if(!empty($_POST)) {
			$update_profile = "UPDATE users SET first_name = '".$_POST['first_name']."',
			last_name = '".$_POST['last_name']."',
			address = '".$_POST['address']."',
			mobile_number = '".$_POST['mobile_number']."' WHERE user_id=".$_SESSION['user_id'];

			if (!mysql_query($update_profile)) { die('Error: ' . mysql_error());}
			else {
				$error_class = 'error-success'; 
				$error ='Your Profile has been updated.';
				$_SESSION['first_name'] = $_POST['first_name'];
				$_SESSION['last_name'] = $_POST['last_name'];
			}
		}
		
		$sql1 = "SELECT * FROM users where user_id=".$_SESSION['user_id'];
		$sql_qry1=mysql_query($sql1);
		$row=mysql_fetch_array($sql_qry1);
		
		$username=$row['user_name'];
		$email=$row['email'];
		$firstname=$row['first_name'];
		$lastname=$row['last_name'];
		$address=$row['address'];
		$mob=$row['mobile_number'];
		
		$_SESSION['first_name'] = $row['first_name'];
		$_SESSION['last_name'] = $row['last_name'];
		
		?>
		
		<!--  Booking History start -->
		<?php
			$b_hs = "SELECT mv.movie_id, mv.movie_name, th.theatre_name, b_t_f_t.date_of_booking, s_t.show_time, t_r.ticket_price, t_r.ticket_type, b_t_f_t.number_of_seats, b_t_f_t.seat_numbers, b_t_f_t.booking_id
							FROM booking_ticket_for_theatre b_t_f_t
							JOIN theatre_show_timings t_s_t ON t_s_t.theatre_show_time_id = b_t_f_t.theatre_show_time_id
							JOIN screens scr ON scr.screen_id = t_s_t.screen_id
							JOIN movies mv ON mv.movie_id = scr.movie_id
							JOIN theatres th ON th.theatre_id = scr.movie_id
							JOIN show_timing s_t ON s_t.show_time_id = b_t_f_t.show_time_id
							JOIN ticket_rate t_r ON t_r.ticket_rate_id = b_t_f_t.ticket_rate_id
							WHERE user_id =".$_SESSION['user_id']."
							ORDER BY b_t_f_t.date_of_booking DESC";
							
							
							$b_hs_qry1 = mysql_query($b_hs);
							$sno=0;
							$even_odd='';
		?>
		<div id="accordion">
		<!--<span><input type="button" class="buttonSubmit" onclick="return calceling();" value="Go For Cancellation" name="cancel"></span>
			<fieldset class="collapsible">-->
			
				<legend class="collapse-processed"><a href="#">Booking History</a></legend>
				
					<?php 
						$height = 'height:auto'; 
						while($b_hs_qry_row1 = mysql_fetch_object($b_hs_qry1)){
							$sno++;
							if($sno>5){$height='height:389px; overflow-y: scroll;';}
						}
						$sno=0;
					?>
					<div class='history' style='<?php echo $height; ?>;'>
						<?php 
							$b_hs_qry = mysql_query($b_hs); 
							if(mysql_affected_rows()) { 
						?>
						<table>
							<tr><th>S.No</th><th>Movie</th><th>Theatre</th><th>Show Date</th><th>Show Time</th><th>Ticket Type</th><th>No Of Seats</th><th>Seat No</th><th>Total Amt</th></tr>
							
							<?php
							
							while($b_hs_qry_row = mysql_fetch_object($b_hs_qry)){
							$sno++;
							if($sno%2==0){$even_odd='even';}else{$even_odd='odd';}
							//$total_amount_bh = $b_hs_qry_row->number_of_seats*$b_hs_qry_row->ticket_price;
								echo "<tr class='$even_odd'><td>$sno</td><td><a class='movie-redirect' target='_blank' href='movie-details.php?id=$b_hs_qry_row->movie_id'>$b_hs_qry_row->movie_name</a></td><td>$b_hs_qry_row->theatre_name</td><td>$b_hs_qry_row->date_of_booking</td><td>$b_hs_qry_row->show_time</td><td>$b_hs_qry_row->ticket_type</td><td>$b_hs_qry_row->number_of_seats</td><td>$b_hs_qry_row->seat_numbers</td><td>".$b_hs_qry_row->number_of_seats*$b_hs_qry_row->ticket_price." Rs/-</td></tr>";
							}
							
							?>
						
						</table>
						<?php
						} else {
							echo "<p class='no-booking-history'>You haven't booked a ticket.</p> <p class='no-booking-history'>To Book the ticket click here <a href='$path'>Book</a></p>";
						}
						
						?>
					</div>
			</fieldset>		
		</div>
		<!-- Booking History End -->
		
			<form id='wrapper' action='profile.php' method='post'>
				<fieldset>
					<legend>My Profile</legend>
						<div class='<?php echo $error_class; ?>'><?php echo $error; ?></div>
						<label for='user_name' >User Name:<span class="<?php echo $error_class; ?>">
						<input type='text' name='user_name' id='user_name' maxlength="50" value="<?php echo $username?>" disabled="disabled" />
						</span></label>
						<br/>
						<!--<label for='password' >Password<span class='field-required'> *</span>:</label>
						<input type='password' name='password' id='password' maxlength="50" /><br/>-->
						
						<label for='email' >Email Address:
						<input type='text' name='email' id='email' maxlength="50" value="<?php echo $email?>" disabled="disabled" />
						</label>
						<br/>
						
						<label for='first_name' >First Name:
						<input type='text' name='first_name' id='first_name' value="<?php echo $firstname?>" maxlength="50" />
						</label>
						<br/>
						<div class='field-error' id='field-error-firstname'>Frist Name should contain min 4, max 20 characters and may contain a-z, A-Z, 0-9, _</div>
						
						<label for='last_name' >Last Name:
						<input type='text' name='last_name' id='last_name' maxlength="50" value="<?php echo $lastname?>" />
						</label>
						<br/>
						<div class='field-error' id='field-error-lastname'>last Name should contain min 4, max 20 characters and may contain a-z, A-Z, 0-9, _</div>
						
						<label for='address' >Address:
						<input type='text' name='address' id='address' maxlength="50" value="<?php echo $address?>" />
						</label>
						<br/>
						<div class='field-error' id='field-error-address'>Address should contain min 10, max 40 characters and may contain a-z, A-Z, 0-9, _</div>
						
						<label for='mobile_number' >Mobile Number:
						<input type='text' name='mobile_number' id='mobile_number' maxlength="50" value="<?php echo $mob?>"/>
						</label>
						<br/>
						<div class='field-error' id='field-error-mobileno'>Enter a valid 10 digits Mobile No.</div>
						
						<input type='submit' id='update_profile' name='save' value='Save' />
				</fieldset>
				<!--<div id="book-div">
					<br>
					<span class="select-label"><a href="#" id="update_profile">Save</a></span>
				</div>-->
			</form>

		</div>
		
		<div id='note' class='message'>Note:<span>User Name and Email Address can't be changed, because this fields are unique for each user.</span></div>
		
	</div>
  <div class="profile-footer-div"><p class="footer-bottom"> <a title="NITK Online Movie Ticket Booking" href="<?php echo $path;?>"> &copy;2012 NITK Online Movie Ticket Booking.</a></p></div>
  </div>
 </body>
 <?php mysql_close($con); ?>
</html>
