<?php
session_start();

$link= @mysqli_connect(
		'localhost',//主機名(ip)
		'root',//使用者
		'a1043328',//密碼
		'07mid');//使用的資料庫名

$result=mysqli_query($link," SELECT * FROM product");
	
	// echo "<table border=1>";
	echo '<form action="" method="post">';

while ($row=mysqli_fetch_assoc($result)){


	echo $row['Name'];
	// echo "<tr>";
	// echo "<td>".$row['Name']."</td><td>".$row['Price']."</td><td>".$row['Status']."</td>"."</br>";
	// echo "</tr>";

	echo '<input type="text" size="5" name="Quantity" value="1"/>'."</br>";
}	

	echo "<input type='submit' value='訂購'/>";

	echo "</form>";

	// header("Location: savecart.php");



// echo '<form action="" method="post">
// 	選擇商品: 
// 	<select name="Item">
//  		<option value="S001"> - $</option>
//   		<option value="S002"> - $</option>
//   		<option value="S003"> - $</option> 
// 	</select>
// 	<input type="text" size="5" name="Quantity" value="1"/>
// 	<input type="submit" value="訂購"/>
// 	</form>';


?>