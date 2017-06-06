<?php
session_start();
require("sql/linksql.php");

// $link= @mysqli_connect(
// 		'localhost',
// 		'root',
// 		'21427jack',
// 		'phpproject');
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
					<?php
					if(isset($_SESSION["code"])){
						echo "<a href='catalog.php'>選購</a> <a href='logout.php'>登出</a>";
					}else{
						echo "<a href='log.php'>登入</a> <a href='reg.php'>註冊</a>";
					}
					?>
				</div>
				<div class="reHome">
				<a href="home.php">回首頁</a>
				</div>
			</div>

			<div class="main">
				<div class="mainleft">
      				<img src="img/logo.png" width=100%>
				</div>
				<div class="mainright">
					<img src="img/click.png" width=100% height=100%>
				</div>
			</div>

			<div class="meals">
    
				<div class="mealsleft">
					<ul type="none">
						<li id="clickme1">飯食</li>
						<li id="clickme2">麵食</li>
						<li id="clickme3">飲料</li>
						<li id="clickme4">其他</li>
					</ul>
				</div>
				<div class="mealsright" id="hello0" >
					<h3>熱門商品</h3>
					<table>
					<?php
					$result=mysqli_query($link," SELECT Name,SUM(Total_Amount),Produce_Code FROM list,product WHERE list.Produce_Code=product.Code and species='飯食' and Status='yes' GROUP BY Produce_Code ORDER BY SUM(Total_Amount) DESC LIMIT 1");
					while ($row=mysqli_fetch_assoc($result)) {
						$code=$row['Produce_Code'];
						echo "<tr><td><img src='img/".$code.".jpg'><br/>";
						echo $row['Name']."</td>";
					}

					$result=mysqli_query($link," SELECT Name,SUM(Total_Amount),Produce_Code FROM list,product WHERE list.Produce_Code=product.Code and species='麵食' and Status='yes' GROUP BY Produce_Code ORDER BY SUM(Total_Amount) DESC LIMIT 1");
					while ($row=mysqli_fetch_assoc($result)) {
						$code=$row['Produce_Code'];
						echo "<td><img src='img/".$code.".jpg'><br/>";
						echo $row['Name']."</td></tr>";

					}
					$result=mysqli_query($link," SELECT Name,SUM(Total_Amount),Produce_Code FROM list,product WHERE list.Produce_Code=product.Code and species='飲料' and Status='yes' GROUP BY Produce_Code ORDER BY SUM(Total_Amount) DESC LIMIT 1");
					while ($row=mysqli_fetch_assoc($result)) {
						$code=$row['Produce_Code'];
						echo "<tr><td><img src='img/".$code.".jpg'><br/>";
						echo $row['Name']."</td>";
					}

					$result=mysqli_query($link," SELECT Name,SUM(Total_Amount),Produce_Code FROM list,product WHERE list.Produce_Code=product.Code and species='其他' and Status='yes' GROUP BY Produce_Code ORDER BY SUM(Total_Amount) DESC LIMIT 1");
					while ($row=mysqli_fetch_assoc($result)) {
						$code=$row['Produce_Code'];
						echo "<td><img src='img/".$code.".jpg'><br/>";
						echo $row['Name']."</td></tr>";

					}
					?>
					</table>
				</div>
				<div class="mealsright" id="hello1">
				<h3>飯食</h3>
				<?php
					$result=mysqli_query($link," SELECT * FROM product WHERE species='飯食' and Status='yes'");
					echo "<table><tr>";
					$n=0;
					while ($row=mysqli_fetch_assoc($result)){
						$code=$row['Code'];
						echo "<td><img src='img/".$code.".jpg'><br/>".$row['Name']."</td>";
						$n++;
						if($n%3==0){
							echo "</tr><tr>";
						}
					}
					echo "</table>";
				?>
				</div>
				<div class="mealsright" id="hello2">
				<h3>麵食</h3>
				<?php
					$result=mysqli_query($link," SELECT * FROM product WHERE species='麵食' and Status='yes'");
					echo "<table><tr>";
					$n=0;
					while ($row=mysqli_fetch_assoc($result)){
						$code=$row['Code'];
						echo "<td><img src='img/".$code.".jpg'><br/>".$row['Name']."</td>";
						$n++;
						if($n%3==0){
							echo "</tr><tr>";
						}
					}
					echo "</table>";
				?>
				</div>
				<div class="mealsright" id="hello3">
				<h3>飲料</h3>
				<?php
					$result=mysqli_query($link," SELECT * FROM product WHERE species='飲料' and Status='yes'");
					echo "<table><tr>";
					$n=0;
					while ($row=mysqli_fetch_assoc($result)){
						$code=$row['Code'];
						echo "<td><img src='img/".$code.".jpg'><br/>".$row['Name']."</td>";
						$n++;
						if($n%3==0){
							echo "</tr><tr>";
						}
					}
					echo "</table>";
				?>
				</div>
				<div class="mealsright" id="hello4">
				<h3>其他</h3>
				<?php
					$result=mysqli_query($link," SELECT * FROM product WHERE species='其他' and Status='yes'");
					echo "<table><tr>";
					$n=0;
					while ($row=mysqli_fetch_assoc($result)){
						$code=$row['Code'];
						echo "<td><img src='img/".$code.".jpg'><br/>".$row['Name']."</td>";
						$n++;
						if($n%3==0){
							echo "</tr><tr>";
						}
					}
					echo "</table>";
				?>
				</div>
			</div>
			<div class="hot">
				<h1>熱門商品</h1>
				<h3>飯食</h3>
				<?php
				$n=1;
				$result=mysqli_query($link," SELECT Name,SUM(Total_Amount),Produce_Code FROM list,product WHERE list.Produce_Code=product.Code and species='飯食' and Status='yes' GROUP BY Produce_Code ORDER BY SUM(Total_Amount) DESC LIMIT 3");
				while ($row=mysqli_fetch_assoc($result)) {
					$code=$row['Produce_Code'];
					echo $n.". ".$row['Name']."<img src='img/".$code.".jpg'><br/>";
					$n++;
				}
				?>
				<h3>麵食</h3>
				<?php
				$n=1;
				$result=mysqli_query($link," SELECT Name,SUM(Total_Amount),Produce_Code FROM list,product WHERE list.Produce_Code=product.Code and species='麵食' and Status='yes' GROUP BY Produce_Code ORDER BY SUM(Total_Amount) DESC LIMIT 3");
				while ($row=mysqli_fetch_assoc($result)) {
					$code=$row['Produce_Code'];
					echo $n.". ".$row['Name']."<img src='img/".$code.".jpg'><br/>";
					$n++;
				}
				?>
				<h3>飲料</h3>
				<?php
				$n=1;
				$result=mysqli_query($link," SELECT Name,SUM(Total_Amount),Produce_Code FROM list,product WHERE list.Produce_Code=product.Code and species='飲料' and Status='yes' GROUP BY Produce_Code ORDER BY SUM(Total_Amount) DESC LIMIT 3");
				while ($row=mysqli_fetch_assoc($result)) {
					$code=$row['Produce_Code'];
					echo $n.". ".$row['Name']."<img src='img/".$code.".jpg'><br/>";
					$n++;
				}
				?>
				<h3>其他</h3>
				<?php
				$n=1;
				$result=mysqli_query($link," SELECT Name,SUM(Total_Amount),Produce_Code FROM list,product WHERE list.Produce_Code=product.Code and species='其他' and Status='yes' GROUP BY Produce_Code ORDER BY SUM(Total_Amount) DESC LIMIT 3");
				while ($row=mysqli_fetch_assoc($result)) {
					$code=$row['Produce_Code'];
					echo $n.". ".$row['Name']." <img src='img/".$code.".jpg'><br/>";
					$n++;
				}
				?>
			</div>
		</div>
		<div class="floor">
			<div class="floorright">
				如點餐過程遇任何疑問或是建議，歡迎來電洽詢並指教！
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				地址：高雄市楠梓區大學十街330巷37弄8號
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				電話：0988-812-915
			</div>
		</div>

		<!-- Scripts -->
			<script src="js/jquery.min.js"></script>
			<script src="js/home.js"></script>

	</body>
</html>