<?php
session_start();
require("sql/linksql.php");

//$link= @mysqli_connect(
//		'localhost',
//		'root',
//		'21427jack',
//		'phpproject');
mysqli_query($link,'SET NAMES utf8');
if(isset($_SESSION["CODE"])){
	$code=$_SESSION["CODE"];
	$result=mysqli_query($link," SELECT * FROM produt WHERE code='$code'");
	while ($row=mysqli_fetch_assoc($result)){
		echo "已存至購物車";
	}

	setcookie($code."[code]",$id,time()+3600);
	setcookie($code."[name]",$name,time()+3600);
	setcookie($code."[price]",$price,time()+3600);
	setcookie($code."[quantity]",$quantity,time()+3600);
}
  header("Location: shoppingcart.php")

?>