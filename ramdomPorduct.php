<form action="" method="post">
	商品種類：<select name="species">
		<option>---</option>
		<option value="飯食">飯食</option>
		<option value="麵食">麵食</option>
		<option value="飲料">飲料</option>
		<option value="其他">其他</option>
	</select></br>
	<input type='submit' value='選擇'>
</form>

<?php
require("sql/linksql.php");

mysqli_query($link,'SET NAMES utf8');

if(isset($_POST['species'])){
	$species=$_POST['species'];
	$datetime=date('Y-m-j');
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
			mysqli_query($link," INSERT INTO ramdom (ProductCode, RamdomChange,datetime) VALUES ('$Rporduct','新增','$datetime')");

		}
	}
	$result=mysqli_query($link," SELECT * FROM product WHERE Code='$Rporduct' ");
	while ($row=mysqli_fetch_assoc($result)){
		echo "商品名稱：".$row['Name']."<br/>";
		echo "商品價格：".$row['Price']."<br/>";
		setcookie("Ramdom".$row['Code'],$row['Code'],time()+3600);
		setcookie("Ramdom".$row['Name'],$row['Name'],time()+3600);
		setcookie("Ramdom".$row['Name'].$row['Price'],$row['Price'],time()+3600);
		setcookie("Ramdom".$row['Code']."Quantity","1",time()+3600);
		setcookie("Ramdom".$row['Code']."Remark","無",time()+3600);
	}


}

mysqli_close($link);
