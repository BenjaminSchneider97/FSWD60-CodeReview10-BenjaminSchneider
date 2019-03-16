<?php 
	$mysqli = @mysqli_connect('localhost','root','', 'cr10_benjamin_schneider_biglibrary');
	if (!$mysqli) {
	   die("Connection failed: " . mysqli_connect_error());
	}
?>