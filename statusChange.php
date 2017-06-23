<?php
require("sql/linksql.php");

	mysqli_query($link,'SET NAMES utf8');
	
	$Code=$_GET['code'];
	$Status=$_POST['Status'];
	mysqli_query($link,"UPDATE product SET Status='$Status' WHERE Code='$Code'");
	header("Location: productView.php");
?>