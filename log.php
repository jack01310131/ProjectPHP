<html>
	<head>
		<title>外送輕易點</title>
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="css/title.css" />
		<link rel="stylesheet" type="text/css" href="css/log.css" />
		<link rel="stylesheet" type="text/css" href="css/button.css" />

	</head>
	<body>
		<div class="container">

			<div class="header" > 
				<div class="lonig">
				<a href="reg.php">註冊</a>
				</div>
				<div class="reHome">
				<a href="home.php">回首頁</a>
				</div>
			</div>
			<div class="main">
			    <div class="maincenter">
			    	<img src="img/cl.png" style="width:500px">
			    	<!-- <br/>登錄 -->
			    	<br/><br/>
			    	<form action="" method="post">
						帳號：<input type="text" name="UID" style="height:27px;"></br>
						密碼：<input type="password" name="pwd" style="height:27px;"></br></br></br>
						<input type="submit" id="button1" value="登錄" style="width:100px;height:50px;"></br></br>
					</form>
					<button onclick="self.location.href='reg.php'" id='button1'>註冊</button>
			    </div>
			</div>
		</div>
	</body>

<?php
session_start();
require("sql/linksql.php");

mysqli_query($link,'SET NAMES utf8');



if (isset($_POST['UID'])){

	$UID=$_POST["UID"];
	$pwd=$_POST["pwd"];
	$result=mysqli_query($link," SELECT * FROM member ");
	while ($row=mysqli_fetch_assoc($result)) 
	{
		if ($row['UID']==$UID) 
		{
			if ($row['pwd']==$pwd) 
			{
				$_SESSION["code"]=$row['code'];
				if($row['other']=="user")
				{
					header("Location:home.php");
				}if($row['other']=="admin")
				{
					header("Location:Order_overview.php");
				}
			}
		}

	}
	echo "登錄失敗";
}

mysqli_close($link);


?>