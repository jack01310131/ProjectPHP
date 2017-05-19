<?php
session_start();
require("sql/linksql.php");

$link= @mysqli_connect(
		'localhost',
		'root',
		'a1043328',
		'php');
if(isset($_SESSION['code'])){
	$result=mysqli_query($link," SELECT * FROM product");
	$userCode=$_SESSION["code"];
	echo '<form action="" method="post">';
	$n=0;
	while ($row=mysqli_fetch_assoc($result)){
	echo $row['Name']." ";
	echo '<input type="text" size="5" name="Quantity[]" value="0"/>
		<input type="text" size="8" name="Remark[]" value="無"><br/>';
	$n++;
	}	
		echo "<input type='submit' value='訂購'/><br/>";
		echo "<a href = 'logout.php' >登出</a>";
	echo "</form>";
	if (isset($_POST['Quantity'])) {
		$j=0;
		$result2=mysqli_query($link," SELECT * FROM product");
		while ($row=mysqli_fetch_assoc($result2)){
				echo $row['Name']." ".$row['Code'];
				$code=$row['Code'];
				$Q=$_POST['Quantity'][$j];
				$R=$_POST['Remark'][$j];
				echo " ".$R."<br/>";
				$j++;
				$k=1;
				if($Q>0){
					setcookie($row['Code'],$row['Code'],time()+3600);
					setcookie($row['Name'],$row['Name'],time()+3600);
					setcookie($row['Price'],$row['Price'],time()+3600);
					setcookie($code."Quantity",$Q,time()+3600);
					setcookie($code."Remark",$R,time()+3600);
				}
		}
		if ($k!=0) {
			header("Location: shoppingcart.php");

		}

	}
	mysqli_close($link);

}
else
	header("Location: log.php");
