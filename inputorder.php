<html>
	<head>
		<title>外送輕易點</title>
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="css/title.css" />
		<link rel="stylesheet" type="text/css" href="css/home.css" />
	</head>
	<body>
		<div class="container">
			<div class="header" > 
				<div class="lonig">
				<a href="Order_overview.php">訂單總覽</a> <a href="productView.php">商品總攬</a> <a href="logout.php">登出</a>
				</div>
				<div class="reHome">
				<a href="home.php">回首頁</a>
				</div>
			</div>
			<div class="main">
				<p><font size=6><b>新增商品及價格</b></font></p>
				<form action='' method='post'>
					名稱：<input type='text' name='Name'>
					價格：<input type='text' name='Price'>
					種類：<select name="species">
							<option>---</option>
							<option value="飯食">飯食</option>
							<option value="麵食">麵食</option>
							<option value="飲料">飲料</option>
							<option value="其他">其他</option>
							</select> 
					<input type='submit' value='送出'><br>
				</form>
			</div>
		</div>
	</body>
</html>



<?php
require("sql/linksql.php");

mysqli_query($link,'SET NAMES utf8');

if (isset($_POST['Name']) && isset($_POST['Price'])) {
	$Name=$_POST['Name'];
	$Price=$_POST['Price'];
	$species=$_POST['species'];
	mysqli_query($link," INSERT INTO product (Name,Price,Status,species) VALUES ('$Name','$Price','yes','$species') ");

	$result=mysqli_query($link," SELECT * FROM product WHERE Name='$Name' and Price='$Price' ");
	while ($row=mysqli_fetch_assoc($result)) {
		echo "新增的資料為：<br/>名稱：".$row['Name']."   價格：".$row['Price']." 種類：".$row['species']."<br/>";
	}
	header("Location: uploadimg.php?name=$Name");
}

mysqli_close($link);
?>
