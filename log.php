<html>
	<head>
		<title>外送輕易點</title>
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="css/title.css" />
		<link rel="stylesheet" type="text/css" href="css/log.css" />
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
			    	登錄<br/><br/>
			    	<form action="" method="post">
						帳號：<input type="text" name="UID"></br>
						密碼：<input type="password" name="pwd"></br></br></br>
						<input type="submit" value="登錄" style="width:100px;height:50px;"></br></br>
						<a href="reg.php">註冊</a>
					</form>
			    </div>
			</div>
		</div>
	</body>

<?php
session_start();
require("sql/linksql.php");

// $link= @mysqli_connect(
// 		'localhost',
// 		'root',
// 		'21427jack',
// 		'phpproject');
mysqli_query($link,'SET NAMES utf8');


echo "<br><br><a href=reg.php>註冊<br></a>";
if (isset($_POST['UID'])){

	$UID=$_POST["UID"];
	$pwd=$_POST["pwd"];
	$result=mysqli_query($link," SELECT * FROM member ");
	while ($row=mysqli_fetch_assoc($result)) 
	{
		if ($row['UID']==$UID) 
		{
			if ($row['pwd']==$pwd) 
			{;
				$_SESSION["code"]=$row['code'];
				if($row['other']=="user")
				{
					header("Location:catalog.php");
				}if($row['other']=="admin")
				{echo "111";
					header("Location:Order_overview.php");
				}
			}
		}

	}
	echo "登錄失敗";
}

mysqli_close($link);


?>