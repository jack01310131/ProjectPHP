
<?php
$code=$_GET["code"];
$Quantity=$_POST["quantity"];
$R=$_GET["R"];
if($R=="yes")
{
	setcookie("Ramdom".$code."Quantity",$Quantity,time()+3600);
}if($R=="no")
{
	setcookie($code."Quantity",$Quantity,time()+3600);
}
header("Location: shoppingcart.php");