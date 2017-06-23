<?php
session_start();
require("sql/linksql.php");


mysqli_query($link,'SET NAMES utf8');
$memberCode=$_SESSION['code'];

$time=date("H:i:s",strtotime("+30 min"));
$result=mysqli_query($link," SELECT address FROM member WHERE code=$memberCode ");
while ($row=mysqli_fetch_assoc($result)){
	$address=$row['address'];
}
$total=0;
?>
<html>
	<head>
		<script language=javascript>
		function show_confirm()
		{
			var r=confirm("確定要下單嗎");
			if (r==true)
			{
				return true;
			}
			else
			{
		  		alert("您取消下單了");
		  		return false;
			}
		}
		</script>
		<title>外送輕易點</title>
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="css/title.css" />
		<link rel="stylesheet" type="text/css" href="css/comfirm.css" />

	</head>
	<body>
		<div class="container">

			<div class="header" > 
				<div class="lonig">
				<a href='shoppingcart.php'>購物車</a> <a href="catalog.php">繼續選購</a> <a href="logout.php">登出</a>
				</div>
				<div class="reHome">
				<a href="home.php">回首頁</a>
				</div>
			</div>
			<div class="main">
				<div class="mainleft">
					      				<?php

					mysqli_query($link,'SET NAMES utf8');

					$result=mysqli_query($link," SELECT * FROM product WHERE species='飯食' ");
					while ($row=mysqli_fetch_assoc($result)){
						$code=$row['Code'];
						if (isset($_COOKIE[$row['Code']])) {
						$name=$_COOKIE[$row['Name']];
						$price=$_COOKIE[$code.$row['Price']];
						$quantity=$_COOKIE[$code."Quantity"];
						$remark=$_COOKIE[$code."Remark"];
						echo "名稱：".$name." 單價：".$price." 數量：".$quantity." 備註：".$remark;
						echo "<br/>";
						$total+=$price*$quantity;
						}
					}
					$result=mysqli_query($link," SELECT * FROM product WHERE species='麵食' ");
					while ($row=mysqli_fetch_assoc($result)){
						$code=$row['Code'];
						if (isset($_COOKIE[$row['Code']])) {
						$name=$_COOKIE[$row['Name']];
						$price=$_COOKIE[$code.$row['Price']];
						$quantity=$_COOKIE[$code."Quantity"];
						$remark=$_COOKIE[$code."Remark"];
						echo "名稱：".$name." 單價：".$price." 數量：".$quantity." 備註：".$remark;
						echo "<br/>";
						$total+=$price*$quantity;
						}
					}
					$result=mysqli_query($link," SELECT * FROM product WHERE species='飲料' ");
					while ($row=mysqli_fetch_assoc($result)){
						$code=$row['Code'];
						if (isset($_COOKIE[$row['Code']])) {
						$name=$_COOKIE[$row['Name']];
						$price=$_COOKIE[$code.$row['Price']];
						$quantity=$_COOKIE[$code."Quantity"];
						$remark=$_COOKIE[$code."Remark"];
						echo "名稱：".$name." 單價：".$price." 數量：".$quantity." 備註：".$remark;
						echo "<br/>";
						$total+=$price*$quantity;
						}
					}
					$result=mysqli_query($link," SELECT * FROM product WHERE species='其他' ");
					while ($row=mysqli_fetch_assoc($result)){
						$code=$row['Code'];
						if (isset($_COOKIE[$row['Code']])) {
						$name=$_COOKIE[$row['Name']];
						$price=$_COOKIE[$code.$row['Price']];
						$quantity=$_COOKIE[$code."Quantity"];
						$remark=$_COOKIE[$code."Remark"];
						echo "名稱：".$name." 單價：".$price." 數量：".$quantity." 備註：".$remark;
						echo "<br/>";
						$total+=$price*$quantity;
						}
					}
					
					?>
					<hr>
					<?php

					mysqli_query($link,'SET NAMES utf8');

					$result=mysqli_query($link," SELECT * FROM product WHERE species='飯食' ");
					while ($row=mysqli_fetch_assoc($result)){
						$code=$row['Code'];
						if (isset($_COOKIE["Ramdom".$row['Code']])) {
							$name=$_COOKIE["Ramdom".$row['Name']];
							$price=$_COOKIE["Ramdom".$row['Name'].$row['Price']];
							$quantity=$_COOKIE["Ramdom".$code."Quantity"];
							$remark=$_COOKIE["Ramdom".$code."Remark"];
							echo "名稱：".$name." 單價：".$price." 數量：".$quantity." 備註：".$remark;
							echo "<br/>";
							$total+=$price*$quantity;
						}
					}
					$result=mysqli_query($link," SELECT * FROM product WHERE species='麵食' ");
					while ($row=mysqli_fetch_assoc($result)){
						$code=$row['Code'];
						if (isset($_COOKIE["Ramdom".$row['Code']])) {
							$name=$_COOKIE["Ramdom".$row['Name']];
							$price=$_COOKIE["Ramdom".$row['Name'].$row['Price']];
							$quantity=$_COOKIE["Ramdom".$code."Quantity"];
							$remark=$_COOKIE["Ramdom".$code."Remark"];
							echo "名稱：".$name." 單價：".$price." 數量：".$quantity." 備註：".$remark;
							echo "<br/>";
							$total+=$price*$quantity;
						}
					}
					$result=mysqli_query($link," SELECT * FROM product WHERE species='飲料' ");
					while ($row=mysqli_fetch_assoc($result)){
						$code=$row['Code'];
						if (isset($_COOKIE["Ramdom".$row['Code']])) {
							$name=$_COOKIE["Ramdom".$row['Name']];
							$price=$_COOKIE["Ramdom".$row['Name'].$row['Price']];
							$quantity=$_COOKIE["Ramdom".$code."Quantity"];
							$remark=$_COOKIE["Ramdom".$code."Remark"];
							echo "名稱：".$name." 單價：".$price." 數量：".$quantity." 備註：".$remark;
							echo "<br/>";
							$total+=$price*$quantity;
						}
					}
					$result=mysqli_query($link," SELECT * FROM product WHERE species='其他' ");
					while ($row=mysqli_fetch_assoc($result)){
						$code=$row['Code'];
						if (isset($_COOKIE["Ramdom".$row['Code']])) {
							$name=$_COOKIE["Ramdom".$row['Name']];
							$price=$_COOKIE["Ramdom".$row['Name'].$row['Price']];
							$quantity=$_COOKIE["Ramdom".$code."Quantity"];
							$remark=$_COOKIE["Ramdom".$code."Remark"];
							echo "名稱：".$name." 單價：".$price." 數量：".$quantity." 備註：".$remark;
							echo "<br/>";
							$total+=$price*$quantity;
						}
					}
					?>
				</div>
				<div class="mainright">

					<br><table><td>
					<form action='' method='post' onsubmit='return show_confirm()'>
						送達時間：<input type='time' name='GetTime' value=<?php echo $time;?>><br/>
						地址：<input type='text' name='Address' value=<?php echo $address;?>><br/>
						<input type='submit' value='送出 '/><br/>
					</form>
					<?php
					echo "<br/>含運費價格：".($total+30);
					?></td><td>
					<img src='img/cute.jpg'></td>
					</table>
				</div>
			</div>
		</duv>
	</body>
	
<html>

<?php
require("sql/linksql.php");

// $link= @mysqli_connect(
// 		'localhost',
// 		'root',
// 		'21427jack',
// 		'phpproject');
mysqli_query($link,'SET NAMES utf8');
if(isset($_SESSION['code']))
{
	if (isset($_POST['Address'])) {
		$Recipient_Data=date('Y-m-j H:i:s');
		$Recipient_GetTime=$_POST['GetTime'];
		$Recipient_Address=$_POST['Address'];
		$GetTimeHours=date("H",strtotime($Recipient_GetTime));
		$total=$total+30;
		mysqli_query($link," INSERT INTO invoice (Member_Code,Recipient_Data,Recipient_GetTime,Recipient_Address,status,GetTimeHours,totalprice) VALUES ('$memberCode','$Recipient_Data','$Recipient_GetTime','$Recipient_Address','no','$GetTimeHours','$total') ");
		sleep(2);
		$result=mysqli_query($link," SELECT code FROM invoice WHERE Member_Code='$memberCode' and Recipient_Data='$Recipient_Data'");
		while ($row=mysqli_fetch_assoc($result)){
			$invoice_Code=$row['code'];
		}
		$result=mysqli_query($link," SELECT * FROM product");
		while ($row=mysqli_fetch_assoc($result)){
			$ProductCode=$row['Code'];
			if (isset($_COOKIE[$row['Code']])) {
				$name=$_COOKIE[$row['Name']];
				$price=$_COOKIE[$ProductCode.$row['Price']];
				$quantity=$_COOKIE[$ProductCode."Quantity"];
				$remark=$_COOKIE[$ProductCode."Remark"];
				$total=$price*$quantity;
				mysqli_query($link," INSERT INTO list (invoice_Code,Produce_Code,Total_Amount,Total_Sum,Remarks) VALUES ('$invoice_Code','$ProductCode','$quantity','$total','$remark')");
				
				setcookie($ProductCode,"",time()-3600);
				setcookie($name,"",time()-3600);
				setcookie($ProductCode.$price,"",time()-3600);
				setcookie($ProductCode."Quantity","",time()-3600);
				setcookie($ProductCode."Remark","",time()-3600);
			}
			if (isset($_COOKIE["Ramdom".$row['Code']])) {
				$name=$_COOKIE["Ramdom".$row['Name']];
				$price=$_COOKIE["Ramdom".$row['Name'].$row['Price']];
				$quantity=$_COOKIE["Ramdom".$ProductCode."Quantity"];
				$remark=$_COOKIE["Ramdom".$ProductCode."Remark"];
				$total=$price*$quantity;
				mysqli_query($link," INSERT INTO list (invoice_Code,Produce_Code,Total_Amount,Total_Sum,Remarks) VALUES ('$invoice_Code','$ProductCode','$quantity','$total','$remark')");
				
				setcookie("Ramdom".$ProductCode,"",time()-3600);
				setcookie("Ramdom".$name,"",time()-3600);
				setcookie("Ramdom".$row['Name'].$price,"",time()-3600);
				setcookie("Ramdom".$ProductCode."Quantity","",time()-3600);
				setcookie("Ramdom".$ProductCode."Remark","",time()-3600);
			}
		}
		echo "下單成功  將自動回到首頁";
		header("Refresh:2;url=home.php");

	}
}
else
	header("Location: log.php");
mysqli_close($link);
?>
