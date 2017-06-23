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
				<a href="log.php">登錄</a>
				</div>
				<div class="reHome">
				<a href="home.php">回首頁</a>
				</div>
			</div>
			<div class="main">
				<div class="maincenter">
					註冊<br/><br/>
					<form action="" method="post">
						帳號：<input type="text" name="UID"></br>
						密碼：<input type="password" name="pwd"></br>
						確認密碼:<input type="password" name="pw2" /> <br>
						姓名:<input type="text" name="name"></br>
						性別:男<input type="radio" name="gender" value="male">女<input type="radio" name="gender" value="female"><br>
						職業：<select name="job">
								<option>---</option>
								<option value="學生">學生</option>
								<option value="教師">教師</option>
								<option value="上班族">上班族</option>
								<option value="設計師">設計師</option>
								<option value="瑜珈老師">瑜珈老師</option>
							</select></br>
						email：<input type="text" name="email"></br>
						電話：<input type="text" name="phone"></br>
						生日:<input type="date" name="Bday"></br>
						地址：<input type="text" name="address" /> <br><br>
						<input type="submit" id="button1" value="送出">
					</form>
				</div>
			</div>
		</div>
	</body>
</html>


<?php
require("sql/linksql.php");

if (isset($_POST['name'])){

$UID=$_POST["UID"];
$pwd=$_POST["pwd"];
$pw2=$_POST["pw2"];
$name=$_POST["name"];
$gender=$_POST["gender"];
$job=$_POST["job"];
$email=$_POST["email"];
$phone=$_POST["phone"];
$Bday=$_POST["Bday"];
$address=$_POST["address"];


mysqli_query($link,'SET NAMES utf8');

$result=mysqli_query($link," SELECT * FROM member ");

	while ($row=mysqli_fetch_assoc($result)) {
		if ($row['name']==$name) {
			echo "此帳號已被使用";
			header("Refresh:3;URL=reg.php");
		}
	}
	mysqli_query($link," INSERT INTO member (UID,pwd,name,gender,job,email,phone,Bday,address,other) 
		VALUES ('$UID','$pwd','$name','$gender','$job','$email','$phone','$Bday','$address','user')");
			echo "帳號申請成功";
			header("Refresh:3;URL=log.php");

}

mysqli_close($link);
?>