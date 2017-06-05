<?php
$code=$_GET["code"];
$name=$_GET["name"];
$price=$_GET["price"];

setcookie("Ramdom".$code,"",time()-3600);
setcookie("Ramdom".$name,"",time()-3600);
setcookie("Ramdom".$name.$price,"",time()-3600);
setcookie("Ramdom".$code."Quantity","",time()-3600);
setcookie("Ramdom".$code."Remark","",time()-3600);

header("Location: shoppingcart.php");
?>