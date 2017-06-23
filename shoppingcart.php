<?php
session_start();
$total=0;
require("sql/linksql.php");

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
				<div class="center"><h1>我的訂單</h1></div>
			</div>

			<div class="main">
    			<div class="species">
      			飯食
    			</div>
	    		<div class="meals">
	    			<?php

					mysqli_query($link,'SET NAMES utf8');

					$result=mysqli_query($link," SELECT * FROM product WHERE species='飯食' ");
					echo "<table>";
					while ($row=mysqli_fetch_assoc($result)){
						$code=$row['Code'];
						if (isset($_COOKIE[$row['Code']])) {
						$name=$_COOKIE[$row['Name']];
						$price=$_COOKIE[$code.$row['Price']];
						$quantity=$_COOKIE[$code."Quantity"];
						$remark=$_COOKIE[$code."Remark"];
						echo "<tr><td><img src=img/".$code.".jpg ></td>";   //<td><a href='delShopingCart.php?code=$code&name=$row[Name]&price=$row[Price]'>刪除</a></td>
						echo "<td>".$name."</td><td>單價：".$price."</td><td>數量：".$quantity."</td><td>備註：".$remark."</td><td><button onclick=self.location.href='delShopingCart.php?code=$code&name=$row[Name]&price=$row[Price]'>刪除</button></td></tr>";
						$total+=$price*$quantity;
						}
					}
					echo "</table>";
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
					echo "<table>";
					while ($row=mysqli_fetch_assoc($result)){
						$code=$row['Code'];
						if (isset($_COOKIE[$row['Code']])) {
						$name=$_COOKIE[$row['Name']];
						$price=$_COOKIE[$code.$row['Price']];
						$quantity=$_COOKIE[$code."Quantity"];
						$remark=$_COOKIE[$code."Remark"];
						echo "<tr><td><img src=img/".$code.".jpg ></td>";
						echo "<td>".$name."</td><td>單價：".$price."</td><td>數量：".$quantity."</td><td>備註：".$remark."</td><td><button onclick=self.location.href='delShopingCart.php?code=$code&name=$row[Name]&price=$row[Price]'>刪除</button></td></tr>";
						$total+=$price*$quantity;
						}
					}
					echo "</table>";
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
					echo "<table>";
					while ($row=mysqli_fetch_assoc($result)){
						$code=$row['Code'];
						if (isset($_COOKIE[$row['Code']])) {
						$name=$_COOKIE[$row['Name']];
						$price=$_COOKIE[$code.$row['Price']];
						$quantity=$_COOKIE[$code."Quantity"];
						$remark=$_COOKIE[$code."Remark"];
						echo "<tr><td><img src=img/".$code.".jpg ></td>";
						echo "<td>".$name."</td><td>單價：".$price."</td><td>數量：".$quantity."</td><td>備註：".$remark."</td><td><button onclick=self.location.href='delShopingCart.php?code=$code&name=$row[Name]&price=$row[Price]'>刪除</button></td></tr>";
						$total+=$price*$quantity;
						}
					}
					echo "</table>";
					?>
	    		</div>
  			</div>
  			<div class="main">
    			<div class="species">
      			其他
    			</div>
	    		<div class="meals">
	    			<?php

					mysqli_query($link,'SET NAMES utf8');

					$result=mysqli_query($link," SELECT * FROM product WHERE species='其他' ");
					echo "<table>";
					while ($row=mysqli_fetch_assoc($result)){
						$code=$row['Code'];
						if (isset($_COOKIE[$row['Code']])) {
						$name=$_COOKIE[$row['Name']];
						$price=$_COOKIE[$code.$row['Price']];
						$quantity=$_COOKIE[$code."Quantity"];
						$remark=$_COOKIE[$code."Remark"];
						echo "<tr><td><img src=img/".$code.".jpg ></td>";
						echo "<td>".$name."</td><td>單價：".$price."</td><td>數量：".$quantity."</td><td>備註：".$remark."</td><td><button onclick=self.location.href='delShopingCart.php?code=$code&name=$row[Name]&price=$row[Price]'>刪除</button></td></tr>";
						$total+=$price*$quantity;
						}
					}
					echo "</table>";
					?>
	    		</div>
  			</div>


			<div class="main">
				<h1>隨機訂單</h1>
    			<div class="species">
      			飯食
    			</div>
	    		<div class="meals">
	    			<?php

					mysqli_query($link,'SET NAMES utf8');

					$result=mysqli_query($link," SELECT * FROM product WHERE species='飯食' ");
					echo "<table id='ss'>";
					while ($row=mysqli_fetch_assoc($result)){
						$code=$row['Code'];
						if (isset($_COOKIE["Ramdom".$row['Code']])) {
							$name=$_COOKIE["Ramdom".$row['Name']];
							$price=$_COOKIE["Ramdom".$row['Name'].$row['Price']];
							$quantity=$_COOKIE["Ramdom".$code."Quantity"];
							$remark=$_COOKIE["Ramdom".$code."Remark"];
							echo "<form action='changequantity.php?code=$code&R=yes' method='post'>";
							echo "<tr><td><img src=img/".$code.".jpg ></td><td>";
							echo "<a id='aclick' href='delRShopingCart.php?code=$code&name=$row[Name]&price=$row[Price]'>刪除</a></td><td><a  id='aclick' href='reramdom.php?code=$code&name=$row[Name]&price=$row[Price]'>重選</a></td><td>".$name."</td><td>單價：".$price."</td><td>數量：".$quantity."</td><td>備註：".$remark;
							echo "</td><td><input type='text'name='quantity' size='1'></td><td>																	
								<input type='submit' value='數量變更'></td></tr>											
								</form>";
							$total+=$price*$quantity;
						}
					}
					echo "<table>";
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
					echo "<table id='ss' >";
					while ($row=mysqli_fetch_assoc($result)){
						$code=$row['Code'];
						if (isset($_COOKIE["Ramdom".$row['Code']])) {
							$name=$_COOKIE["Ramdom".$row['Name']];
							$price=$_COOKIE["Ramdom".$row['Name'].$row['Price']];
							$quantity=$_COOKIE["Ramdom".$code."Quantity"];
							$remark=$_COOKIE["Ramdom".$code."Remark"];
							echo "<form action='changequantity.php?code=$code&R=yes' method='post'>";
							echo "<tr><td><img src=img/".$code.".jpg ></td><td>";
							echo "<a id='aclick' href='delRShopingCart.php?code=$code&name=$row[Name]&price=$row[Price]'>刪除</a></td><td><a  id='aclick' href='reramdom.php?code=$code&name=$row[Name]&price=$row[Price]'>重選</a></td><td>".$name."</td><td>單價：".$price."</td><td>數量：".$quantity."</td><td>備註：".$remark;
							echo "</td><td><input type='text'name='quantity' size='1'></td><td>																	
								<input type='submit' value='數量變更' ></td></tr>											
								</form>";
							$total+=$price*$quantity;
						}
					}
					echo "<table>";
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
					echo "<table id='ss'>";
					while ($row=mysqli_fetch_assoc($result)){
						$code=$row['Code'];
						if (isset($_COOKIE["Ramdom".$row['Code']])) {
							$name=$_COOKIE["Ramdom".$row['Name']];
							$price=$_COOKIE["Ramdom".$row['Name'].$row['Price']];
							$quantity=$_COOKIE["Ramdom".$code."Quantity"];
							$remark=$_COOKIE["Ramdom".$code."Remark"];
							echo "<form action='changequantity.php?code=$code&R=yes' method='post'>";
							echo "<tr><td><img src=img/".$code.".jpg ></td><td>";
							echo "<a id='aclick' href='delRShopingCart.php?code=$code&name=$row[Name]&price=$row[Price]'>刪除</a></td><td><a  id='aclick' href='reramdom.php?code=$code&name=$row[Name]&price=$row[Price]'>重選</a></td><td>".$name."</td><td>單價：".$price."</td><td>數量：".$quantity."</td><td>備註：".$remark;
							echo "</td><td><input type='text'name='quantity' size='1'></td><td>																	
								<input type='submit' value='數量變更'></td></tr>											
								</form>";
							$total+=$price*$quantity;
						}
					}
					echo "<table>";
					?>
	    		</div>
  			</div>
  			<div class="main">
    			<div class="species">
      			其他
    			</div>
	    		<div class="meals">
	    			<?php

					mysqli_query($link,'SET NAMES utf8');

					$result=mysqli_query($link," SELECT * FROM product WHERE species='其他' ");
					echo "<table id='ss'>";
					while ($row=mysqli_fetch_assoc($result)){
						$code=$row['Code'];
						if (isset($_COOKIE["Ramdom".$row['Code']])) {
							$name=$_COOKIE["Ramdom".$row['Name']];
							$price=$_COOKIE["Ramdom".$row['Name'].$row['Price']];
							$quantity=$_COOKIE["Ramdom".$code."Quantity"];
							$remark=$_COOKIE["Ramdom".$code."Remark"];
							echo "<form action='changequantity.php?code=$code&R=yes' method='post'>";
							echo "<tr><td><img src=img/".$code.".jpg ></td><td>";
							echo "<a id='aclick' href='delRShopingCart.php?code=$code&name=$row[Name]&price=$row[Price]'>刪除</a></td><td><a  id='aclick' href='reramdom.php?code=$code&name=$row[Name]&price=$row[Price]'>重選</a></td><td>".$name."</td><td>單價：".$price."</td><td>數量：".$quantity."</td><td>備註：".$remark;
							echo "</td><td><input type='text'name='quantity' size='1'></td><td>																	
								<input type='submit' value='數量變更'></td></tr>											
								</form>";
							$total+=$price*$quantity;
						}
					}
					echo "<table>";
					?>
	    		</div>
  			</div>

  			<div class="footer">
			    <div class="footerright">
			    	<?php
					echo "小計：NT$ ",$total,"<br/>";
					echo "外送費：NT$ 30<br/>";
					echo "總金額：NT$ ",$total+30,"<br/>";
					mysqli_close($link);
					?>
			    	<button onclick="self.location.href='OrderComfirm.php'">下單</button>
			    </form>
			    </div>
		    </div>

		</div>
	</body>

	