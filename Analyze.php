<?php
require("Config/GoogleChart.php");

require("sql/linksql.php");

// $link= @mysqli_connect(
		// 'localhost',
		// 'root',
		// '21427jack',
		// 'phpproject');

mysqli_query($link,'SET NAMES utf8');
$data = array();
$labels = array();
$legends = array();
$result=mysqli_query($link," SELECT SUM(Total_Amount) as T_Amount FROM list");
while ($row=mysqli_fetch_assoc($result)) {
	$T_Amount=$row['T_Amount'];
}
$result=mysqli_query($link," SELECT name, SUM(Total_Amount) as Amount FROM list,product WHERE list.Produce_Code = product.Code GROUP BY Produce_Code");
while($row=mysqli_fetch_assoc($result))
{
	echo "商品：".$row['name']." 銷售數：".$row['Amount']."<br/>";
	$Percent=(round($row['Amount']/$T_Amount,2)*100)."%";
	array_push($data,$row['Amount']);
	array_push($labels,$Percent);
	array_push($legends,$row['name']);
}
	echo "產品總銷售數：".$T_Amount."<br/>";
$chart = new GooglePieChart(500,300);
$chart->setData($data,$labels,$legends);
$chart->draw();
?>