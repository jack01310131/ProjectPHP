<?php
require("sql/linksql.php");

mysqli_query($link,'SET NAMES utf8');

?>
<html>
	<head>
		<title>外送輕易點</title>
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="css/title.css" />
		<link rel="stylesheet" type="text/css" href="css/View.css" />
	</head>
	<body>
		<div class="container">
			<div class="header" > 
				<div class="lonig">
				<a href="Order_overview.php">訂單總覽</a> <a href="logout.php">登出</a>
				</div>
				<div class="reHome">
				<a href="home.php">回首頁</a>
				</div>
			</div>
			<div class="main">
				<p><font size=6><b>商品總覽</b></font></p>
				<table>
				<?php
					
					$result=mysqli_query($link," SELECT * FROM product ");
					while ($row=mysqli_fetch_assoc($result)){
						echo "<form action='statusChange.php?code=$row[Code]' method='post'>";
						echo "<tr><td>".$row['Name']."</td><td>狀態".$row['Status']."</td><td><select name='Status'>
							<option>---</option>
							<option value='yes'>yes</option>
							<option value='no'>no</option>
							</select>
							<input type='submit' value='修改'></td><td><a href='uploadimg.php?name=$row[Name]'>修改照片</td></tr>";
						echo "</form>";
					}
				?>
				</table>
			</div>
		</div>
	</body>
</html>
