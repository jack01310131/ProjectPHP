<?php
session_start();
$link= @mysqli_connect(
		'localhost',
		'root',
		'21427jack',
		'phpproject');
mysqli_query($link,'SET NAMES utf8');
$result=mysqli_query($link," SELECT * FROM invoice ");

while ($row=mysqli_fetch_assoc($result) ){
	$NeedPrice=0;

	echo $row['Member_Code']."   ".$row['Recipient_GetTime']."   ".$row['Recipient_Address']."<br/>";
	$ICode=$row['Code'];
	$result2=mysqli_query($link," SELECT * FROM list WHERE invoice_Code = '$ICode' ");
	while ($row2=mysqli_fetch_assoc($result2) ){
		$PCode=$row2['Produce_Code'];
		$result3=mysqli_query($link," SELECT * FROM product WHERE Code='$PCode' ");
		while ($row3=mysqli_fetch_assoc($result3)) {
			echo $row3['Name'];
		}
		echo "     ".$row2['Total_Amount']."    ".$row2['Remarks']."<br/>";
		$NeedPrice+=$row2['Total_Sum'];
	}


}


echo "<br/><br/>".$NeedPrice;
mysqli_close($link);
?>