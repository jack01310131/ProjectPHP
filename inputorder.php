<form action='' method='post'>
		名稱：<input type='text' name='Name'>
		價格：<input type='text' name='Price'>
		<input type='submit' value='送出'>
</form>
<?php
$link= @mysqli_connect(
		'localhost',//主機名(ip)
		'root',//使用者
		'21427jack',//密碼
		'phpproject');//使用的資料庫名
mysqli_query($link,'SET NAMES utf8');

if (isset($_POST['Name']) && isset($_POST['Price'])) {
	$Name=$_POST['Name'];
	$Price=$_POST['Price'];

	mysqli_query($link," INSERT INTO product (Name,Price,Status) VALUES ('$Name','$Price','yes') ");

	$result=mysqli_query($link," SELECT * FROM product WHERE Name='$Name' and Price='$Price' ");
	while ($row=mysqli_fetch_assoc($result)) {
		echo "新增的資料為：<br/>名稱：".$row['Name']."   價格：".$row['Price']."<br/>";
	}
}
mysqli_close($link);
?>
