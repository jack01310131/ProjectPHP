<?php
session_start();
require("sql/linksql.php");

mysqli_query($link,'SET NAMES utf8');
if(isset($_SESSION['code']) ){
	$Member_Code=$_SESSION['code'];
}
else
	header("Location: log.php");
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
				<a href='catalog.php'>選購</a> <a href="logout.php">登出</a>
				</div>
				<div class="reHome">
				<a href="home.php">回首頁</a>
				</div>
			</div>

			<div class="maintop">
				<?php
				$result=mysqli_query($link," SELECT * FROM invoice WHERE invoice.Member_Code=$Member_Code ");

				while ($row=mysqli_fetch_assoc($result) )
				{
					echo "下單時間：".$row['Recipient_Data']."&nbsp&nbsp取餐時間：".$row['Recipient_GetTime']."&nbsp&nbsp地址：".$row['Recipient_Address']."&nbsp&nbsp總金額：".$row['totalprice'];
					echo "<br/>餐點內容：<br/>";
					echo "<table>";
					echo "<tr><td>商品名稱</td><td>數量</td><td>備註</td></tr>";
					$ICode=$row['Code'];
					$result2=mysqli_query($link," SELECT * FROM list WHERE invoice_Code = '$ICode' ");
					while ($row2=mysqli_fetch_assoc($result2) )
					{
						echo "<tr>";
						$PCode=$row2['Produce_Code'];
						$result3=mysqli_query($link," SELECT * FROM product WHERE Code='$PCode' ");
						while ($row3=mysqli_fetch_assoc($result3)) 
						{
							echo "<td>".$row3['Name']."</td>";
						}
						echo " <td>".$row2['Total_Amount']."</td><td>".$row2['Remarks']."</td>";
						echo "</tr>";
					}
					echo "</table>";
					echo "<hr>";
					
				}
				mysqli_close($link);
				?>
			</div>
		</div>
	</body>
</htnl>