<?php ob_start();
session_start();
?>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.9.2/themes/smoothness/jquery-ui.css" /> 
<script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>

<div title="隨機點餐" id="anly001" style="padding: 0.5em; font-family: 新細明體; font-size: 1.17em; line-height: 1.5em; letter-spacing: 0.1em; display: block; text-align: justify; display: none;">
<?php require("ramdomPorduct.php");?> </div>

<html>
	<head>
		<title>外送輕易點</title>
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="css/title.css" />
		<link rel="stylesheet" type="text/css" href="css/catalog.css" />
	</head>
	<body>
		<div class="container">

			<div class="header" > 
				<div class="lonig">
				<a href="logout.php">登出</a>
				</div>
				<div class="reHome">
				<a href="home.php">回首頁</a>
				</div>
			</div>

			<div class="main">
    			<div class="species" id="species1">
      			飯食
    			</div>
	    		<div class="meals" id="meals1">
				    <?php
					
					require("sql/linksql.php");

					mysqli_query($link,'SET NAMES utf8');


						echo '<form action="" method="post">';
						$result=mysqli_query($link," SELECT * FROM product WHERE species='飯食' and Status='yes'");
						$userCode=$_SESSION["code"];
						echo "<table width='800'>";
						while ($row=mysqli_fetch_assoc($result)){
						echo "<tr><td>".$row['Name']."</td><td>".$row['Price']."</td><td>";
						echo '<input type="text" size="1" name="Quantity[]" value="0"/></td><td>
							<input type="text" size="8" name="Remark[]" value="無"></td></tr>';

						}
						echo "<table>";
					?>
				</div>
  			</div>

  			<div class="main" >
    			<div class="species" id="species2">
      			麵食
    			</div>
	    		<div class="meals" id="meals2">
				    <?php
					
					require("sql/linksql.php");

				
					mysqli_query($link,'SET NAMES utf8');


						// echo '<form action="" method="post">';
						$result=mysqli_query($link," SELECT * FROM product WHERE species='麵食' and Status='yes'");
						$userCode=$_SESSION["code"];
						echo "<table width='800'>";
						while ($row=mysqli_fetch_assoc($result)){
						echo "<tr><td>".$row['Name']."</td><td>".$row['Price']."</td><td>";
						echo '<input type="text" size="1" name="Quantity[]" value="0"/></td><td>
							<input type="text" size="8" name="Remark[]" value="無"></td></tr>';

						}
						echo "<table>";
					?>
	     		</div>
  			</div>
  			<div class="main">
    			<div class="species" id="species3">
      			飲料
    			</div>
	    		<div class="meals" id="meals3">
				    <?php
					
					require("sql/linksql.php");

					
					mysqli_query($link,'SET NAMES utf8');


						// echo '<form action="" method="post">';
						$result=mysqli_query($link," SELECT * FROM product WHERE species='飲料' and Status='yes'");
						$userCode=$_SESSION["code"];
						echo "<table width='800'>";
						while ($row=mysqli_fetch_assoc($result)){
						echo "<tr><td>".$row['Name']."</td><td>".$row['Price']."</td><td>";
						echo '<input type="text" size="1" name="Quantity[]" value="0"/></td><td>
							<input type="text" size="8" name="Remark[]" value="無"></td></tr>';

						}
						echo "<table>";
					?>
	     		</div>
  			</div>
  			<div class="main">
    			<div class="species" id="species3">
      			其他
    			</div>
	    		<div class="meals" id="meals3">
				    <?php
					
					require("sql/linksql.php");

					mysqli_query($link,'SET NAMES utf8');


						// echo '<form action="" method="post">';
						$result=mysqli_query($link," SELECT * FROM product WHERE species='其他' and Status='yes' ");
						$userCode=$_SESSION["code"];
						echo "<table width='800'>";
						while ($row=mysqli_fetch_assoc($result)){
						echo "<tr><td>".$row['Name']."</td><td>".$row['Price']."</td><td>";
						echo '<input type="text" size="1" name="Quantity[]" value="0"/></td><td>
							<input type="text" size="8" name="Remark[]" value="無"></td></tr>';

						}
						echo "<table>";
					?>
	     		</div>
  			</div>
  			<div class="imgcenter">
				<a href="javascript: $('#anly001').dialog({autoOpen: true, show:{effect:'drop', direction:'right', duration: 1}, width: '640', height: 'auto', resizable: false});"><img src="img/random.png" style="float:center;width:400px"></a>
			</div>	    
		</div>
		<div class="footer">
		    <div class="footerleft">
			    
		    </div>
		    <div class="footerright">
		    <input type='submit' value='訂購'/><br/>
		    </form>
		    </div>
		</div>

	<body>
</html>
<?php
require("sql/linksql.php");

mysqli_query($link,'SET NAMES utf8');

	if (isset($_POST['Quantity'])) {
		$j=0;
		$result2=mysqli_query($link," SELECT * FROM product WHERE species='飯食' ");
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
					setcookie($code.$row['Price'],$row['Price'],time()+3600);
					setcookie($code."Quantity",$Q,time()+3600);
					setcookie($code."Remark",$R,time()+3600);
				}
		}
		$result2=mysqli_query($link," SELECT * FROM product WHERE species='麵食' ");
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
					setcookie($code.$row['Price'],$row['Price'],time()+3600);
					setcookie($code."Quantity",$Q,time()+3600);
					setcookie($code."Remark",$R,time()+3600);
				}
		}$result2=mysqli_query($link," SELECT * FROM product WHERE species='飲料' ");
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
					setcookie($code.$row['Price'],$row['Price'],time()+3600);
					setcookie($code."Quantity",$Q,time()+3600);
					setcookie($code."Remark",$R,time()+3600);
				}
		}$result2=mysqli_query($link," SELECT * FROM product WHERE species='其他' ");
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
					setcookie($code.$row['Price'],$row['Price'],time()+3600);
					setcookie($code."Quantity",$Q,time()+3600);
					setcookie($code."Remark",$R,time()+3600);
				}
		}
		// if ($k!=0) {
			header("Location: shoppingcart.php");
			ob_end_flush();
		// }

	}
	mysqli_close($link);

?>
			
