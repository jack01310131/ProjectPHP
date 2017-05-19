<?php
session_start();
$total=0;
require("sql/linksql.php");

// $link= @mysqli_connect(
// 		'localhost',
// 		'root',
// 		'a1043328',
// 		'php');
if(isset($_SESSION['code'])){
	$result=mysqli_query($link," SELECT * FROM product");
	while ($row=mysqli_fetch_assoc($result)){
		$code=$row['Code'];
		if (isset($_COOKIE[$row['Code']])) {
		$name=$_COOKIE[$row['Name']];
		$price=$_COOKIE[$row['Price']];
		$quantity=$_COOKIE[$code."Quantity"];
		$remark=$_COOKIE[$code."Remark"];
		echo "<a href='delShopingCart.php?code=$code&name=$row[Name]&price=$row[Price]'>刪除</a> 名稱：".$name." 單價：".$price." 數量：".$quantity." 備註：".$remark."<br>";
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
