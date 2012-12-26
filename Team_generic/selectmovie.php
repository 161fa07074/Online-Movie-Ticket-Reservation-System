<html>
 <head>
 <script type='text/javascript' src="./js/jquery.js" ></script>
 <script type='text/javascript' src="./js/selectmovie.js" ></script>
 </head>

 <body>
  <?php include './include/config.php';?> 
<?php $movies = mysql_query("SELECT movie_id,movie_name FROM movies");
?>

<select class='field'>
<!--<option id='0' selected='selected' class='field-class'></option>-->

<?php 
	while($row = mysql_fetch_array($movies)) {
	echo "<option class='field-class' id='$row[movie_id]' >$row[movie_name]</option>";
	}
?>
</select>

<br/><br/>

<select class='field' id='select-theatre'>
</select>

<br/><br/>

<select class='field' id='select-date'></select>



<?php
mysql_close($con);
?>


 </body>
</html>
