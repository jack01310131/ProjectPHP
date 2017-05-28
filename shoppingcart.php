<?php
session_start();
$total=0;
// require("sql/linksql.php");
$link= @mysqli_connect(
		'localhost',
		'root',
		'21427jack',
		'phpproject');
if(isset($_SESSION['code']) ){
	;
}
else
	header("Location: log.php");
?>
<html>
	<head>
		<title>外送輕易點</title>
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="css/title.css" />
		<link rel="stylesheet" type="text/css" href="css/shoppingcart.css" />
	</head>
	<body>
		<div class="container">

			<div class="header" > 
				<div class="lonig">
				<a href="catalog.php">繼續選購</a> <a href="logout.php">登出</a>
				</div>
				<div class="reHome">
				<a href="home.php">回首頁</a>
				</div>
			</div>

			<div class="meals">
				檢視並確認訂單<br/>
				我的訂單
			</div>

			<div class="main">
    			<div class="species">
      			水果
    			</div>
	    		<div class="meals">
	    			<?php

					mysqli_query($link,'SET NAMES utf8');

					$result=mysqli_query($link," SELECT * FROM product WHERE species='水果' ");
					while ($row=mysqli_fetch_assoc($result)){
						$code=$row['Code'];
						if (isset($_COOKIE[$row['Code']])) {
						$name=$_COOKIE[$row['Name']];
						$price=$_COOKIE[$row['Price']];
						$quantity=$_COOKIE[$code."Quantity"];
						$remark=$_COOKIE[$code."Remark"];
						echo "<img src=img/".$code.".png >";
						echo "<a href='delShopingCart.php?code=$code&name=$row[Name]&price=$row[Price]'>刪除</a> 名稱：".$name." 單價：".$price." 數量：".$quantity." 備註：".$remark;
						echo "<br/>";
						$total+=$price*$quantity;
						}
					}
					?>
	    		</div>
  			</div>
  			<div class="main">
    			<div class="species">
      			飲料
    			</div>
	    		<div class="meals">
	    			<?php

					mysqli_query($link,'SET NAMES utf8');

					$result=mysqli_query($link," SELECT * FROM product WHERE species='飲料' ");
					while ($row=mysqli_fetch_assoc($result)){
						$code=$row['Code'];
						if (isset($_COOKIE[$row['Code']])) {
						$name=$_COOKIE[$row['Name']];
						$price=$_COOKIE[$row['Price']];
						$quantity=$_COOKIE[$code."Quantity"];
						$remark=$_COOKIE[$code."Remark"];
						echo "<img src=img/".$code.".png >";
						echo "<a href='delShopingCart.php?code=$code&name=$row[Name]&price=$row[Price]'>刪除</a> 名稱：".$name." 單價：".$price." 數量：".$quantity." 備註：".$remark;
						echo "<br/>";
						$total+=$price*$quantity;
						}
					}
					?>
	    		</div>
  			</div>
  			<div class="main">
    			<div class="species">
      			麵食
    			</div>
	    		<div class="meals">
	    			<?php

					mysqli_query($link,'SET NAMES utf8');

					$result=mysqli_query($link," SELECT * FROM product WHERE species='麵食' ");
					while ($row=mysqli_fetch_assoc($result)){
						$code=$row['Code'];
						if (isset($_COOKIE[$row['Code']])) {
						$name=$_COOKIE[$row['Name']];
						$price=$_COOKIE[$row['Price']];
						$quantity=$_COOKIE[$code."Quantity"];
						$remark=$_COOKIE[$code."Remark"];
						echo "<img src=img/".$code.".png >";
						echo "<a href='delShopingCart.php?code=$code&name=$row[Name]&price=$row[Price]'>刪除</a> 名稱：".$name." 單價：".$price." 數量：".$quantity." 備註：".$remark;
						echo "<br/>";
						$total+=$price*$quantity;
						}
					}
					?>
	    		</div>
  			</div>
  			<div class="meals">
				<br/>隨機訂單
			</div>

			<div class="main">
    			<div class="species">
      			水果
    			</div>
	    		<div class="meals">
	    			<?php

					mysqli_query($link,'SET NAMES utf8');

					$result=mysqli_query($link," SELECT * FROM product WHERE species='水果' ");
					while ($row=mysqli_fetch_assoc($result)){
						$code=$row['Code'];
						if (isset($_COOKIE["Ramdom".$row['Code']])) {
							$name=$_COOKIE["Ramdom".$row['Name']];
							$price=$_COOKIE["Ramdom".$row['Price']];
							$quantity=$_COOKIE["Ramdom".$code."Quantity"];
							$remark=$_COOKIE["Ramdom".$code."Remark"];
							echo "<form action='changequantity.php?code=$code&R=yes' method='post'>";
							echo "<img src=img/".$code.".png >";
							echo "<a href='delShopingCart.php?code=$code&name=$row[Name]&price=$row[Price]'>刪除</a> 名稱：".$name." 單價：".$price." 數量：".$quantity." 備註：".$remark;
							echo " <a href='reramdom.php?code=$code&name=$row[Name]&price=$row[Price]'>重選</a> ";
							echo "<input type='text'name='quantity'>
								<input type='submit' value='數量變更'>
								</form>";
							$total+=$price*$quantity;
						}
					}
					?>
	    		</div>
  			</div>
  			<div class="main">
    			<div class="species">
      			飲料
    			</div>
	    		<div class="meals">
	    			<?php

					mysqli_query($link,'SET NAMES utf8');

					$result=mysqli_query($link," SELECT * FROM product WHERE species='飲料' ");
					while ($row=mysqli_fetch_assoc($result)){
						$code=$row['Code'];
						if (isset($_COOKIE["Ramdom".$row['Code']])) {
							$name=$_COOKIE["Ramdom".$row['Name']];
							$price=$_COOKIE["Ramdom".$row['Price']];
							$quantity=$_COOKIE["Ramdom".$code."Quantity"];
							$remark=$_COOKIE["Ramdom".$code."Remark"];
							echo "<form action='changequantity.php?code=$code&R=yes' method='post'>";
							echo "<img src=img/".$code.".png >";
							echo "<a href='delShopingCart.php?code=$code&name=$row[Name]&price=$row[Price]'>刪除</a> 名稱：".$name." 單價：".$price." 數量：".$quantity." 備註：".$remark;
							echo " <a href='reramdom.php?code=$code&name=$row[Name]&price=$row[Price]'>重選</a> ";
							echo "<input type='text'name='quantity'>
								<input type='submit' value='數量變更'>
								</form>";
							$total+=$price*$quantity;
						}
					}
					?>
	    		</div>
  			</div>
  			<div class="main">
    			<div class="species">
      			麵食
    			</div>
	    		<div class="meals">
	    			<?php

					mysqli_query($link,'SET NAMES utf8');

					$result=mysqli_query($link," SELECT * FROM product WHERE species='麵食' ");
					while ($row=mysqli_fetch_assoc($result)){
						$code=$row['Code'];
						if (isset($_COOKIE["Ramdom".$row['Code']])) {
							$name=$_COOKIE["Ramdom".$row['Name']];
							$price=$_COOKIE["Ramdom".$row['Price']];
							$quantity=$_COOKIE["Ramdom".$code."Quantity"];
							$remark=$_COOKIE["Ramdom".$code."Remark"];
							echo "<form action='changequantity.php?code=$code&R=yes' method='post'>";
							echo "<img src=img/".$code.".png >";
							echo "<a href='delShopingCart.php?code=$code&name=$row[Name]&price=$row[Price]'>刪除</a> 名稱：".$name." 單價：".$price." 數量：".$quantity." 備註：".$remark;
							echo " <a href='reramdom.php?code=$code&name=$row[Name]&price=$row[Price]'>重選</a> ";
							echo "<input type='text'name='quantity'>
								<input type='submit' value='數量變更'>
								</form>";
							$total+=$price*$quantity;
						}
					}
					?>
	    		</div>
  			</div>

  			<div class="footer">
			    <div class="footerright">
			    	<?php
					echo "小計：NT$ ",$total,"<br/>";
					echo "小計：NT$ 30<br/>";
					echo "總金額：NT$ ",$total+30,"<br/>";
					mysqli_close($link);
					?>
			    	<button onclick="self.location.href='OrderComfirm.php'">下單</button>
			    </form>
			    </div>
		    </div>

		</div>
	</body>

	