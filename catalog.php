<?php
session_start();
require("sql/linksql.php");

// $link= @mysqli_connect(
// 		'localhost',
// 		'root',
// 		'21427jack',
// 		'phpproject');
$result=mysqli_query($link," SELECT * FROM product");
$userCode=$_SESSION["code"];
echo '<form action="" method="post">';
$n=0;
while ($row=mysqli_fetch_assoc($result)){
	echo $row['Name']." ".$row['Code'];
	echo '<input type="text" size="5" name="Quantity[]" value="0"/><br/>';
	$n++;
}	
	echo "<input type='submit' value='訂購'/><br/>";
echo "</form>";
if (isset($_POST['Quantity'])) {
	$j=0;
	$result2=mysqli_query($link," SELECT * FROM product");
	while ($row=mysqli_fetch_assoc($result2)){
			echo $row['Name']." ".$row['Code'];
			$code=$row['Code'];
			$a=$_POST['Quantity'][$j];
			echo " ".$a."<br/>";
			$j++;
			$k=1;
			if($a>0){
				setcookie($row['Code'],$row['Code'],time()+3600);
				setcookie($row['Name'],$row['Name'],time()+3600);
				setcookie($row['Price'],$row['Price'],time()+3600);
				setcookie($code."Quantity",$a,time()+3600);
			}
	}
	if ($k!=0) {
		header("Location: shoppingcart.php");

	}

}

?>