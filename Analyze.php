<?php
require("Config/GoogleChart.php");

require("sql/linksql.php");

mysqli_query($link,'SET NAMES utf8');
?>
<html>
	<head>
		<title>外送輕易點</title>
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="css/title.css" />
		<link rel="stylesheet" type="text/css" href="css/home.css" />
		<link rel="stylesheet" type="text/css" href="css/table.css" />
	</head>
	<body>
		<div class="container">
			<div class="header" > 
				<div class="lonig">
				<a href="Order_overview.php">訂單總覽</a> <a href="logout.php">登出</a>
				</div>
				<div class="reHome">
				<a href="home.php">回首頁</a>
				</div>
			</div>
			<div class="maintop">
				<h2>總銷售分析</h2>
				<?php
				$data = array();
				$labels = array();
				$legends = array();
				$result=mysqli_query($link," SELECT SUM(Total_Amount) as T_Amount FROM list");
				while ($row=mysqli_fetch_assoc($result)) {
					$T_Amount=$row['T_Amount'];
				}
				$result=mysqli_query($link," SELECT name, SUM(Total_Amount) as Amount FROM list,product WHERE list.Produce_Code = product.Code GROUP BY Produce_Code");
				echo "<table>";
				echo "<tr><td>商品</td><td>銷售數</td></tr>";
				while($row=mysqli_fetch_assoc($result))
				{
					echo "<tr><td>".$row['name']."</td><td>".$row['Amount']."</td></tr>";
					$Percent=(round($row['Amount']/$T_Amount,2)*100)."%";
					array_push($data,$row['Amount']);
					array_push($labels,$Percent);
					array_push($legends,$row['name']);
				}
				echo "</table>";
				echo "<hr/>總銷售數：".$T_Amount;
				$chart = new GooglePieChart(500,300);
				$chart->setData($data,$labels,$legends);
				$chart->draw();
				?>
				<br/><hr/>
			</div>
			<div class="maintop">
				<h2>飯食銷售分析</h2>
				<?php
				$data = array();
				$labels = array();
				$legends = array();
				$result=mysqli_query($link," SELECT SUM(Total_Amount) as T_Amount FROM list,product WHERE list.Produce_Code = product.Code and species='飯食'");
				while ($row=mysqli_fetch_assoc($result)) {
					$T_Amount=$row['T_Amount'];
				}
				$result=mysqli_query($link," SELECT name, SUM(Total_Amount) as Amount FROM list,product WHERE list.Produce_Code = product.Code and species='飯食' GROUP BY Produce_Code");
				echo "<table>";
				echo "<tr><td>商品</td><td>銷售數</td></tr>";
				while($row=mysqli_fetch_assoc($result))
				{
					echo "<tr><td>".$row['name']."</td><td>".$row['Amount']."</td></tr>";
					$Percent=(round($row['Amount']/$T_Amount,2)*100)."%";
					array_push($data,$row['Amount']);
					array_push($labels,$Percent);
					array_push($legends,$row['name']);
				}
				echo "</table>";
				echo "<hr/>總銷售數：".$T_Amount;
				$chart = new GooglePieChart(500,300);
				$chart->setData($data,$labels,$legends);
				$chart->draw();
				?>
				<br/><hr/>
			</div>
			<div class="maintop">
				<h2>麵食銷售分析</h2>
				<?php
				$data = array();
				$labels = array();
				$legends = array();
				$result=mysqli_query($link," SELECT SUM(Total_Amount) as T_Amount FROM list,product WHERE list.Produce_Code = product.Code and species='麵食' ");
				while ($row=mysqli_fetch_assoc($result)) {
					$T_Amount=$row['T_Amount'];
				}
				$result=mysqli_query($link," SELECT name, SUM(Total_Amount) as Amount FROM list,product WHERE list.Produce_Code = product.Code and species='麵食' GROUP BY Produce_Code");
				echo "<table>";
				echo "<tr><td>商品</td><td>銷售數</td></tr>";
				while($row=mysqli_fetch_assoc($result))
				{
					echo "<tr><td>".$row['name']."</td><td>".$row['Amount']."</td></tr>";
					$Percent=(round($row['Amount']/$T_Amount,2)*100)."%";
					array_push($data,$row['Amount']);
					array_push($labels,$Percent);
					array_push($legends,$row['name']);
				}
				echo "</table>";
				echo "<hr/>總銷售數：".$T_Amount;
				$chart = new GooglePieChart(500,300);
				$chart->setData($data,$labels,$legends);
				$chart->draw();
				?>
				<br/><hr/>
			</div>
			<div class="maintop">
				<h2>飲料銷售分析</h2>
				<?php
				$data = array();
				$labels = array();
				$legends = array();
				$result=mysqli_query($link," SELECT SUM(Total_Amount) as T_Amount FROM list,product WHERE list.Produce_Code = product.Code and species='飲料' ");
				while ($row=mysqli_fetch_assoc($result)) {
					$T_Amount=$row['T_Amount'];
				}
				$result=mysqli_query($link," SELECT name, SUM(Total_Amount) as Amount FROM list,product WHERE list.Produce_Code = product.Code and species='飲料' GROUP BY Produce_Code");
				echo "<table>";
				echo "<tr><td>商品</td><td>銷售數</td></tr>";
				while($row=mysqli_fetch_assoc($result))
				{
					echo "<tr><td>".$row['name']."</td><td>".$row['Amount']."</td></tr>";
					$Percent=(round($row['Amount']/$T_Amount,2)*100)."%";
					array_push($data,$row['Amount']);
					array_push($labels,$Percent);
					array_push($legends,$row['name']);
				}
				echo "</table>";
				echo "<hr/>總銷售數：".$T_Amount;
				$chart = new GooglePieChart(500,300);
				$chart->setData($data,$labels,$legends);
				$chart->draw();
				?>
				<br/><hr/>
			</div>
			<div class="maintop">
				<h2>其他銷售分析</h2>
				<?php
				$data = array();
				$labels = array();
				$legends = array();
				$result=mysqli_query($link," SELECT SUM(Total_Amount) as T_Amount FROM list,product WHERE list.Produce_Code = product.Code and species='其他' ");
				while ($row=mysqli_fetch_assoc($result)) {
					$T_Amount=$row['T_Amount'];
				}
				$result=mysqli_query($link," SELECT name, SUM(Total_Amount) as Amount FROM list,product WHERE list.Produce_Code = product.Code and species='其他' GROUP BY Produce_Code");
				echo "<table>";
				echo "<tr><td>商品</td><td>銷售數</td></tr>";
				while($row=mysqli_fetch_assoc($result))
				{
					echo "<tr><td>".$row['name']."</td><td>".$row['Amount']."</td></tr>";
					$Percent=(round($row['Amount']/$T_Amount,2)*100)."%";
					array_push($data,$row['Amount']);
					array_push($labels,$Percent);
					array_push($legends,$row['name']);
				}
				echo "</table>";
				echo "<hr/>總銷售數：".$T_Amount;
				$chart = new GooglePieChart(500,300);
				$chart->setData($data,$labels,$legends);
				$chart->draw();
				?>
				<br/><hr/>
			</div>
			
			<div class="maintop">
				<h2>取餐時間分析</h2>
				<?php
				/*時間分析*/
				$data = array();
				$labels = array();
				$legends = array();
				$result=mysqli_query($link," SELECT COUNT(GetTimeHours) as T_time FROM invoice");
				while ($row=mysqli_fetch_assoc($result)) {
					$T_time=$row['T_time'];
				}
				$result=mysqli_query($link," SELECT GetTimeHours, COUNT(GetTimeHours) as time FROM invoice GROUP BY GetTimeHours");
				echo "<table>";
				echo "<tr><td>時間</td><td>次數</td></tr>";
				while($row=mysqli_fetch_assoc($result))
				{
					echo "<tr><td>".$row['GetTimeHours']."點</td><td>".$row['time']."</td></tr>";
					$Percent=(round($row['time']/$T_time,2)*100)."%";
					array_push($data,$row['time']);
					array_push($labels,$Percent);
					array_push($legends,($row['GetTimeHours']."點~".($row['GetTimeHours']+1)."點"));
				}
				echo "</table>";
				echo "<hr/>總出單數：".$T_time;
				$chart = new GooglePieChart(500,300);
				$chart->setData($data,$labels,$legends);
				$chart->draw();

				?>
				<br/><hr/>
			</div>
			<div class="maintop">
				<h2>客群分析</h2>
				<?php
				/*客群分析*/
				$data = array();
				$labels = array();
				$legends = array();
				$result=mysqli_query($link," SELECT COUNT(code) as T_time FROM invoice");
				while ($row=mysqli_fetch_assoc($result)) {
					$T_time=$row['T_time'];
				}
				$result=mysqli_query($link," SELECT job, COUNT(invoice.code) as time FROM invoice,member WHERE invoice.Member_Code = member.code GROUP BY job");
				echo "<table>";
				while($row=mysqli_fetch_assoc($result))
				{
					echo "<tr><td>".$row['job']."</td><td>".$row['time']."次</td></tr>";
					$Percent=(round($row['time']/$T_time,2)*100)."%";
					array_push($data,$row['time']);
					array_push($labels,$Percent);
					array_push($legends,($row['job']));
				}
				echo "</table>";
				echo "<hr/>總出單數：".$T_time;
				$chart = new GooglePieChart(500,300);
				$chart->setData($data,$labels,$legends);
				$chart->draw();
				?>
				<br/><hr/>
			</div>
			<div class="maintop">
				<h2>隨機點餐重選率分析</h2>
				<?php
				/*隨機點餐重選率分析*/
				$data = array();
				$labels = array();
				$legends = array();

				$result=mysqli_query($link,"SELECT ProductCode,COUNT(ProductCode) as retime FROM ramdom WHERE RamdomChange='重選' GROUP BY ProductCode");
				$n=0;
				while($row=mysqli_fetch_assoc($result) ){
					$recode[$n]=$row['ProductCode'];
					$retime[$n]=$row['retime'];
					$n++;
				}
				$i=$n;
				$n=0;
				echo "<table>";
				echo "<tr><td>名稱</td><td>選取次數</td><td>重選次數</td><td>重選率</td></tr>";
				$result=mysqli_query($link,"SELECT Name,ProductCode,COUNT(ProductCode) as time FROM ramdom,product WHERE product.Code=ramdom.ProductCode GROUP BY ProductCode");
				while($row=mysqli_fetch_assoc($result))
				{	
					echo "<tr><td>".$row['Name']."</td><td>".$row['time']."</td><td>";
					if($n<$i && $row['ProductCode']==$recode[$n]){
						$changetime=$retime[$n];
						echo $changetime;
						$n++;
					}else{
						$changetime=0;
						echo $changetime;
					}
					$Percent=(round($changetime/$row['time'],2)*100)."%";
					echo "</td><td>".$Percent."</td></tr>";
				}
				echo "</table>";
				?>
				<br/><hr/>
				<div class="maintop">
				<h2>三十天內重選率分析</h2>
				<?php
				/*三十天內重選率分析*/
				$data = array();
				$labels = array();
				$legends = array();

				$Getdate=date("Y-m-j",strtotime("-30 day"));

				
				$result=mysqli_query($link,"SELECT ProductCode,COUNT(ProductCode) as retime FROM ramdom WHERE RamdomChange='重選' and datetime>'$Getdate' GROUP BY ProductCode");
				$n=0;
				while($row=mysqli_fetch_assoc($result) ){
					$recode[$n]=$row['ProductCode'];
					$retime[$n]=$row['retime'];
					$n++;
				}
				$i=$n;
				$n=0;
				echo "<table>";
				echo "<tr><td>名稱</td><td>選取次數</td><td>重選次數</td><td>重選率</td></tr>";
				$result=mysqli_query($link,"SELECT Name,ProductCode,COUNT(ProductCode) as time FROM ramdom,product WHERE product.Code=ramdom.ProductCode and datetime>'$Getdate' GROUP BY ProductCode");
				while($row=mysqli_fetch_assoc($result))
				{	
					echo "<tr><td>".$row['Name']."</td><td>".$row['time']."</td><td>";
					if($n<$i && $row['ProductCode']==$recode[$n]){
						$changetime=$retime[$n];
						echo $changetime;
						$n++;
					}else{
						$changetime=0;
						echo $changetime;
					}
					$Percent=(round($changetime/$row['time'],2)*100)."%";
					echo "</td><td>".$Percent."</td></tr>";
				}
				echo "</table>";
				?>
				<br/><hr/>
			</div>
		</div>
	</body>
</html>
<?php
mysqli_close($link);
?>