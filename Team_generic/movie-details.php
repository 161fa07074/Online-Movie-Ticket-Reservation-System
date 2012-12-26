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
	<script type='text/javascript' src="./js/movie-details.js" ></script> 
 </head>

<body id='movie-details-page'>

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
		<div class="slides_container" style="display:block;">
			<div class="slide" style="display:block;">
			<?php 
				$sel_mov_id = "SELECT movie_name, movie_poster FROM movies WHERE movie_id=".$_GET['id'];
				$sel_mov_id_qry1 = mysql_query($sel_mov_id);
				$sel_mov_id_qry_row1 = mysql_fetch_object($sel_mov_id_qry1);
				echo "<a href='movie-details.php?id=".$_GET['id']."' title='".$sel_mov_id_qry_row1->movie_name."' style='display:block;'><img class='slider-selected-image' style='display:block;' src='./images/".$sel_mov_id_qry_row1->movie_poster."' ></a>";
			?>
			</div>		
		</div>
	</div>
			
</div></div>
 
<div class="content" style="margin-top:30px;">
	<div id='wrapper'>
		<?php
			$sel_mov_id = "SELECT * FROM movies WHERE movie_id=".$_GET['id'];
			$sel_mov_id_qry = mysql_query($sel_mov_id);
			$sel_mov_id_qry_row = mysql_fetch_object($sel_mov_id_qry);
		?>
		<div class='movie-data'><span class='movie-data-label'>Movie Name: </span><span class='movie-data-value'><?php echo $sel_mov_id_qry_row->movie_name; ?></span></div>
		<div class='movie-data'><span class='movie-data-label'>Movie Language: </span><span class='movie-data-value'><?php echo $sel_mov_id_qry_row->movie_language; ?></span></div>
		<div class='movie-data'><span class='movie-data-label'>Movie Director: </span><span class='movie-data-value'><?php echo $sel_mov_id_qry_row->movie_director; ?> </span></div>
		<div class='movie-data'><span class='movie-data-label'>Movie Description: </span><span class='movie-data-value'><?php echo $sel_mov_id_qry_row->movie_decription; ?> </span></div>
		<div class='movie-data'><span class='movie-data-label'>Movie Status: </span><span class='movie-data-value'><?php echo $sel_mov_id_qry_row->islive; ?> </span></div>
		<br/>
		<!--<div class='more-movies'><span>More Movies >> </span></div>-->
		<hr/>
		
		<fieldset class="collapsible">
				<legend class="collapse-processed"><span>More Movies >> </span></legend>
				<?php 
					$sel_mov = "SELECT * FROM movies";
					$sel_mov_qry = mysql_query($sel_mov);
					$sel_mov_qry1 = mysql_query($sel_mov);
					$sno=0;
					$even_odd='';
					$height = 'height:auto';
					while($sel_mov_qry_row1 = mysql_fetch_object($sel_mov_qry1)){
						$sno++;
						if($sno>6){$height = 'height: 110px; overflow-y: scroll;';}
					}
					echo "<div style='$height' class='movie-list-div'>";
					$sno=0;
					$active = 'non-active';
					while($sel_mov_qry_row = mysql_fetch_object($sel_mov_qry)){
						$sno++;
						if($_GET['id']==$sel_mov_qry_row->movie_id){$active = 'active';}else{$active = 'non-active';}
						if($sno%2==0){$even_odd='even';}else{$even_odd='odd';}
						echo "<div class='movie-list $even_odd $active'><span>".$sno."</span><a id='".$_GET['id']."' href='movie-details.php?id=".$sel_mov_qry_row->movie_id."'>".$sel_mov_qry_row->movie_name."</a></div>"; 	
					}
					echo "</div>";
				?>			
		</fieldset>
		
	</div>
</div>
  <div class="footer-div"><p class="footer-bottom"> <a title="NITK Online Movie Ticket Booking" href="<?php echo $path;?>"> &copy;2012 NITK Online Movie Ticket Booking.</a></p></div>
  </div>
 </body>
</html>