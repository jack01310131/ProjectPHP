<?php
session_start();
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
				<a href="inputorder.php">新增商品</a> <a href="Analyze.php">分析訂單</a> <a href="logout.php">登出</a>
				</div>
				<div class="reHome">
				<a href="home.php">回首頁</a>
				</div>
			</div>

			<div class="maintop">
				<?php
				$result=mysqli_query($link," SELECT * FROM invoice,member WHERE invoice.Member_Code=member.code ");

				while ($row=mysqli_fetch_assoc($result) )
				{
					if ($row['status']=="no")
					{
						echo "第 ".$row['Code']."筆訂單";
						echo "&nbsp&nbsp會員編號：".$row['Member_Code']." 會員姓名：".$row['name']."&nbsp&nbsp取餐時間：".$row['Recipient_GetTime']."&nbsp&nbsp地址：".$row['Recipient_Address'];
						echo "<br/>餐點內容：<br/>";
						?>
						<div class="right">
						<?php
						echo "<br/>總金額：".$row['totalprice'];
						echo "&nbsp&nbsp<a href='finshOrder.php?Code=$row[Code]'>完成</a>&nbsp&nbsp<a href='delOrder.php?Code=$row[Code]'>刪除</a><br/><br/>";
						?>
							</div>
						<?php
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
				}
				mysqli_close($link);
				?>
			</div>
		</div>
	</body>
</htnl>