<?php
if(isset($_SESSION['code']));
else
	header("Location: log.php");

session_start();
require("sql/linksql.php");

// $link= @mysqli_connect(
// 		'localhost',
// 		'root',
// 		'21427jack',
// 		'phpproject');
mysqli_query($link,'SET NAMES utf8');
$memberCode=$_SESSION['code'];

$time=date("H:i:s",strtotime("+30 min"));
$result=mysqli_query($link," SELECT address FROM member WHERE code=$memberCode ");
while ($row=mysqli_fetch_assoc($result)){
	$address=$row['address'];
}
?>

<form action='' method='post'>
	送達時間：<input type='time' name='GetTime' value=<?php echo $time;?>><br/>
	地址：<input type='text' name='Address' value=<?php echo $address;?>><br/>
	<input type='submit' value='送出 '/><br/>
</form>

<?php
if (isset($_POST['Address'])) {
	$Recipient_Data=date('Y-m-j H:i:s');
	$Recipient_GetTime=$_POST['GetTime'];
	$Recipient_Address=$_POST['Address'];

	mysqli_query($link," INSERT INTO invoice (Member_Code,Recipient_Data,Recipient_GetTime,Recipient_Address,status) VALUES ('$memberCode','$Recipient_Data','$Recipient_GetTime','$Recipient_Address','no') ");
	sleep(2);
	$result=mysqli_query($link," SELECT code FROM invoice WHERE Member_Code='$memberCode' and Recipient_Data='$Recipient_Data'");
	while ($row=mysqli_fetch_assoc($result)){
		$invoice_Code=$row['code'];
	}
	$result=mysqli_query($link," SELECT * FROM product");
	while ($row=mysqli_fetch_assoc($result)){
		$ProductCode=$row['Code'];
		if (isset($_COOKIE[$row['Code']])) {
		$price=$_COOKIE[$row['Price']];
		$quantity=$_COOKIE[$ProductCode."Quantity"];
		$remark=$_COOKIE[$ProductCode."Remark"];
		$total=$price*$quantity;
		mysqli_query($link," INSERT INTO list (invoice_Code,Produce_Code,Total_Amount,Total_Sum,Remarks) VALUES ('$invoice_Code','$ProductCode','$total','$quantity','$remark')");
		}
	}
	echo "下單成功  將於2秒後回到首頁";
	header("Refresh:2;url=catalog.php");//待改成home

}

?>
