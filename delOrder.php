<?php
require("sql/linksql.php");

mysqli_query($link,'SET NAMES utf8');

$Code=$_GET['Code'];
mysqli_query($link,"DELETE FROM invoice WHERE Code='$Code'");
mysqli_query($link,"DELETE FROM list WHERE invoice_Code='$Code'");
header("Location: Order_overview.php");
