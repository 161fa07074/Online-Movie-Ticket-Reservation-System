<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php 
	session_start(); 
	include './include/config.php';
	$path = $config->base_url.'/homepage.php';
	$signout = $config->base_url.'/functions/logout.php';
	$signuser = $config->base_url.'/profile.php';
	$signin = $config->base_url.'/login.php#wrapper';
	$signup = $config->base_url.'/registration.php#wrapper';
?>
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
 <script type='text/javascript' src="./js/jquery.min.js"></script>
 <script type='text/javascript' src="./js/book_myshow.js" ></script> 
 <script type='text/javascript' src="./js/banner.js" ></script>
 <script type='text/javascript' src="./js/slides.min.jquery.js"></script>

 </head>

 <body id='home-page'>

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
 
  <div class="content" style="margin-top:50px;">
  
  <div id='wrapper'>
  <table class = 'table'>
  <tbody><tr><td>
    <p><span class='select-label'>Select City</span>
	    <select class='field' id='city'>
	      <?php 
			$cities = mysql_query("SELECT city_id, city FROM cities");
			while($cities_row = mysql_fetch_array($cities)) {
				echo "<option value='$cities_row[city_id]' >$cities_row[city]</option>";
			}
		?>
          </select>
		  
	</p></td><td>
	<p><span class='select-label'>Select Theatre</span>
	  <select name="select" class='field' id='theatre'>
        <option value='0'>-Theatre-</option>
        <?php 
				$cities1 = mysql_query("SELECT city_id, city FROM cities");
				$cities_row1 = mysql_fetch_object($cities1);
				$theatres = mysql_query("SELECT theatre_id, theatre_name FROM theatres WHERE city_id=$cities_row1->city_id");
				while($theatres_row = mysql_fetch_array($theatres)) {
					echo "<option value='$theatres_row[theatre_id]' >$theatres_row[theatre_name]</option>";
			}
			?>
      </select>
	</p></td></tr><tr><td>
	<div id='date-div'>
		<p><span class='select-label'>Select Movie</span>
		    <select class='field' id='movie'>
		      <option value='0'>-Movie-</option>
	        </select>
	</p>
	</td><td><br />
		<p><span class='select-label'>Select Date</span>
		  <select class='field' id='date'>
		    <option value='0'>-Date-</option>
	      </select>
	        </p></td></tr></tbody></table>
	</div>
	
	<div id='selected-ticket-summary-div'></div>
	<?php mysql_close($con); ?>

  </div>
	
  </div>
  <div id='note' class='message'>Note:<span>Sign In/Sign Up to book the tickets.</span></div>
  <div class="footer-div"><p class="footer-bottom"> <a title="NITK Online Movie Ticket Booking" href="<?php echo $path;?>"> &copy;2012 NITK Online Movie Ticket Booking.</a></p></div>
  </div>
 </body>
</html>
