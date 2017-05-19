<?php
require("sql/linksql.php");
$link= @mysqli_connect(
		'localhost',
		'root',
		'a1043328',
		'php');
mysqli_query($link,'SET NAMES utf8');

$Code=$_GET['Code'];
mysqli_query($link,"DELETE FROM invoice WHERE Code='$Code'");
mysqli_query($link,"DELETE FROM list WHERE invoice_Code='$Code'");
header("Location:../Order_overview.php");
