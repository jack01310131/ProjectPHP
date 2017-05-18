<?php
session_start();
// require("sql/linksql.php");

$link= @mysqli_connect(
		'localhost',
		'root',
		'21427jack',
		'phpproject');
mysqli_query($link,'SET NAMES utf8');

echo '<form action="" method="post">
			帳號：<input type="text" name="UID"></br>
			密碼：<input type="password" name="pwd"></br>
			<input type="submit" value="送出">
		</form>';

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