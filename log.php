<?php
require("sql/linksql.php");

//$link= @mysqli_connect(
//		'localhost',
//		'root',
//		'21427jack',
//		'phpproject');
echo '<form action="" method="post">
			帳號：<input type="text" name="name"></br>
			密碼：<input type="password" name="pwd"></br>
			<input type="submit" value="送出">
		</form>';

echo "<br><br><a href=reg.php>註冊<br></a>";
if (isset($_POST['name'])){

$name=$_POST["name"];
$pwd=$_POST["pwd"];


mysqli_query($link,'SET NAMES utf8');
$result=mysqli_query($link," SELECT * FROM qone ");
while ($row=mysqli_fetch_assoc($result)) {
	if ($row['name']==$name) {
		if ($row['pwd']==$pwd) {
			header("Location:home1.php?name=$name");
		}
	}

}
echo "登錄失敗";
}

mysqli_close($link);


?>