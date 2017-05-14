<?php
$total=0;
require("sql/linksql.php");

// $link= @mysqli_connect(
// 		'localhost',
// 		'root',
// 		'21427jack',
// 		'phpproject');
$result=mysqli_query($link," SELECT * FROM product");
while ($row=mysqli_fetch_assoc($result)){
	$code=$row['Code'];
	if (isset($_COOKIE[$row['Code']])) {
	$name=$_COOKIE[$row['Name']];
	$price=$_COOKIE[$row['Price']];
	$quantity=$_COOKIE[$code."Quantity"];
	echo "<a href='delShopingCart.php?code=$code&name=$row[Name]&price=$row[Price]'>刪除</a> 名稱：".$name." 單價：".$price." 數量：".$quantity."<br>";
	$total+=$price*$quantity;
	}
}





echo "總價：",$total,"<br>";
echo "<a href='catalog.php'>商品目錄</a>";

?>