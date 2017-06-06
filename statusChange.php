<?php
require("sql/linksql.php");
	// $link= @mysqli_connect(
	// 		'localhost',
	// 		'root',
	// 		'21427jack',
	// 		'phpproject');
	mysqli_query($link,'SET NAMES utf8');
	
	$Code=$_GET['code'];
	$Status=$_POST['Status'];
	mysqli_query($link,"UPDATE product SET Status='$Status' WHERE Code='$Code'");
	header("Location: productView.php");
?>