<form action="" method="post">
	商品種類：<select name="species">
		<option>---</option>
		<option value="水果">水果</option>
		<option value="麵食">麵食</option>
		<option value="飲料">飲料</option>
	</select></br>
	<input type='submit' value='選擇'>
</form>

<?php
require("sql/linksql.php");
// $link= @mysqli_connect(
// 		'localhost',
// 		'root',
// 		'21427jack',
// 		'phpproject');
mysqli_query($link,'SET NAMES utf8');

if(isset($_POST['species'])){
	$species=$_POST['species'];
	$result=mysqli_query($link,"SELECT MAX(Code) as max FROM product");
	while ($row=mysqli_fetch_assoc($result)){
		$maxcode=$row['max'];
	}
	$Rporduct=0;
	while($Rporduct==0){
		$n=rand(1,$maxcode);
		$result=mysqli_query($link," SELECT Code FROM product WHERE Code='$n' and species='$species' and Status='yes' ");
		while ($row=mysqli_fetch_assoc($result)){
			$Rporduct=$row['Code'];
		}
	}
	$result=mysqli_query($link," SELECT * FROM product WHERE Code='$Rporduct' ");
	while ($row=mysqli_fetch_assoc($result)){
		echo "商品名稱：".$row['Name']."<br/>";
		echo "商品價格：".$row['Price']."<br/>";

	}
}

mysqli_close($link);