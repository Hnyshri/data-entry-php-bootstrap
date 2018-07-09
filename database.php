<?php
	$connection = mysql_connect("localhost","root","") or die(mysql_error());
	$database = mysql_select_db('test',$connection) or die(mysql_error()); 
?>