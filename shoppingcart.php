<?php
session_start();
$total=0;
// require("sql/linksql.php");

$link= @mysqli_connect(
		'localhost',
		'root',
		'21427jack',
		'phpproject');
mysqli_query($link,'SET NAMES utf8');


if(isset($_SESSION['code'])){
	$result=mysqli_query($link," SELECT * FROM product");
	while ($row=mysqli_fetch_assoc($result)){
		$code=$row['Code'];
		if (isset($_COOKIE[$row['Code']])) {
		$name=$_COOKIE[$row['Name']];
		$price=$_COOKIE[$row['Price']];
		$quantity=$_COOKIE[$code."Quantity"];
		$remark=$_COOKIE[$code."Remark"];
		echo "<a href='delShopingCart.php?code=$code&name=$row[Name]&price=$row[Price]'>刪除</a> 名稱：".$name." 單價：".$price." 數量：".$quantity." 備註：".$remark;
		echo "<form action='changequantity.php?code=$code&R=no' method='post'>
			<input type='text' name='quantity'>
			<input type='submit' value='數量變更'>
			</form>";
		$total+=$price*$quantity;
		}
	}
	echo "<br/>隨機<br/>";
	$result=mysqli_query($link," SELECT * FROM product");
	while ($row=mysqli_fetch_assoc($result)){
		$code=$row['Code'];
		if (isset($_COOKIE["Ramdom".$row['Code']])) {
		$name=$_COOKIE["Ramdom".$row['Name']];
		$price=$_COOKIE["Ramdom".$row['Price']];
		$quantity=$_COOKIE["Ramdom".$code."Quantity"];
		$remark=$_COOKIE["Ramdom".$code."Remark"];
		echo "<a href='delShopingCart.php?code=$code&name=$row[Name]&price=$row[Price]'>刪除</a> 名稱：".$name." 單價：".$price." 數量：".$quantity." 備註：".$remark;
		echo " <a href='reramdom.php?code=$code&name=$row[Name]&price=$row[Price]'>重選</a>";
		echo "<form action='changequantity.php?code=$code&R=yes' method='post'>
			<input type='text'name='quantity'>
			<input type='submit' value='數量變更'>
			</form>";
		$total+=$price*$quantity;
		}
	}





	echo "總價：",$total,"<br/>";
	echo "<a href='OrderComfirm.php'>下單</a><br/>";
	echo "<a href='catalog.php'>商品目錄</a><br/>";
	echo "<a href = 'logout.php' >登出</a>";
	mysqli_close($link);

}
else
	header("Location: log.php");
