<?php
$con = mysql_connect("localhost","chandrakanth","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("book_myshow");
$config=array();
$config['base_url']='http://localhost/book-myshow';
$config=(object)$config;
?>
