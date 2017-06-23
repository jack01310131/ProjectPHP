<?php
require("sql/linksql.php");

mysqli_query($link,'SET NAMES utf8');
?>
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
				<a href="Order_overview.php">訂單總覽</a> <a href="inputorder.php">新增商品</a> <a href="logout.php">登出</a>
				</div>
				<div class="reHome">
				<a href="home.php">回首頁</a>
				</div>
			</div>
			<div class="main">
				<p><font size=6><b>商品資料</b></font></p>
				<?php
				$Name=$_GET['name'];

				$result=mysqli_query($link," SELECT * FROM product WHERE Name='$Name'");
					while ($row=mysqli_fetch_assoc($result)) {
						$code=$row['Code'];
						echo "<br/>名稱：".$row['Name']."   價格：".$row['Price']." 種類：".$row['species']."<br/>";
					}
				?>
				<form action="" method="post" enctype="multipart/form-data">
					上傳圖片<input type="file" name="upload">
					<input type="submit">
				</form>
				<?php

				if(isset($_FILES["upload"])){
					// echo $_FILES["upload"]["name"]."<br>";				//檔案名字
					// echo $_FILES["upload"]["tmp_name"]."<br>";			//檔案大小
					// echo $_FILES["upload"]["size"]."<br>";				//檔案類型
					// echo $_FILES["upload"]["type"]."<br>";
					$a=pathinfo($_FILES["upload"]["name"]);
					// $t=time();
					// echo $t.".".$a["extension"];
					
					if (copy($_FILES["upload"]["tmp_name"],"img/".$code.".".$a["extension"])) {
						echo "檔案上傳成功";
						header("Refresh:2;url=Order_overview.php");
					}else{
						echo "檔案上傳失敗";
						header("Refresh:2;url=Order_overview.php");
					}
				}

				?>
			</div>
		</div>
	</body>
</html>




