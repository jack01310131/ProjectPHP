<?php
require("sql/linksql.php");

mysqli_query($link,'SET NAMES utf8');

$code=$_GET["code"];
$name=$_GET["name"];
$price=$_GET["price"];
$datetime=date('Y-m-j');

$result=mysqli_query($link,"SELECT species FROM product WHERE Code='$code' ");
while ($row=mysqli_fetch_assoc($result)){
	$species=$row['species'];
}
setcookie("Ramdom".$code,"",time()-3600);
setcookie("Ramdom".$name,"",time()-3600);
setcookie("Ramdom".$name.$price,"",time()-3600);
setcookie("Ramdom".$code."Quantity","",time()-3600);
setcookie("Ramdom".$code."Remark","",time()-3600);




$result=mysqli_query($link,"SELECT MAX(Code) as max FROM product");
	while ($row=mysqli_fetch_assoc($result)){
		$maxcode=$row['max'];
	}
	$Rporduct=0;
	while($Rporduct==0){
		$n=rand(1,$maxcode);
		$result=mysqli_query($link," SELECT Code FROM product WHERE Code='$n' and species='$species' and Status='yes' ");
		while ($row=mysqli_fetch_assoc($result)){
			$Rporduct=$row['Code'];
			mysqli_query($link," INSERT INTO ramdom (ProductCode, RamdomChange,datetime) VALUES ('$Rporduct','重選','$datetime')");

		}
	}
	$result=mysqli_query($link," SELECT * FROM product WHERE Code='$Rporduct' ");
	while ($row=mysqli_fetch_assoc($result)){
		echo "商品名稱：".$row['Name']."<br/>";
		echo "商品價格：".$row['Price']."<br/>";
		setcookie("Ramdom".$row['Code'],$row['Code'],time()+3600);
		setcookie("Ramdom".$row['Name'],$row['Name'],time()+3600);
		setcookie("Ramdom".$row['Name'].$row['Price'],$row['Price'],time()+3600);
		setcookie("Ramdom".$row['Code']."Quantity","1",time()+3600);
		setcookie("Ramdom".$row['Code']."Remark","無",time()+3600);
	}
	header("Location: shoppingcart.php");

mysqli_close($link);
