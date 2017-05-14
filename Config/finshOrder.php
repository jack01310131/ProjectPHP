<?php
require("sql/linksql.php");

mysqli_query($link,'SET NAMES utf8');

$Code=$_GET['Code'];
mysqli_query($link,"UPDATE invoice SET status='yes' WHERE Code='$Code'");
header("Location:../Order_overview.php");
