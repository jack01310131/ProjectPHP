<?php
require("sql/linksql.php");
// $link= @mysqli_connect(
// 		'localhost',
// 		'root',
// 		'21427jack',
// 		'phpproject');
mysqli_query($link,'SET NAMES utf8');

$Code=$_GET['Code'];
mysqli_query($link,"UPDATE invoice SET status='yes' WHERE Code='$Code'");
header("Location:../Order_overview.php");
