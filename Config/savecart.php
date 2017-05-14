<?php
session_start();
require("sql/linksql.php");

// $link= @mysqli_connect(
// 		'localhost',
// 		'root',
// 		'21427jack',
// 		'phpproject');
mysqli_query($link,'SET NAMES utf8');
// if(isset($_SESSION["CODE"])){
	// $code=$_SESSION["CODE"];
	$j=0;
	$result=mysqli_query($link," SELECT * FROM product ");
	while ($row=mysqli_fetch_assoc($result)){
	$code=$_SESSION["$j"];
	echo $row['Name']." ".$code."<br>";
	$j++;
	// setcookie($code.$row['Code'],$id,time()+3600);
	// setcookie($code.$row['Name'],$name,time()+3600);
	// setcookie($code.$row['Price'],$price,time()+3600);
	// setcookie($code.$row['Quantity'],$quantity,time()+3600);
	}

// }
  // header("Location:../shoppingcart.php");
?>