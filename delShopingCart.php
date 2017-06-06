<?php
$code=$_GET["code"];
$name=$_GET["name"];
$price=$_GET["price"];
setcookie($code,"",time()-3600);
setcookie($name,"",time()-3600);
setcookie($code.$price,"",time()-3600);
setcookie($code."Quantity","",time()-3600);
setcookie($code."Remark","",time()-3600);

header("Location: shoppingcart.php");
?>