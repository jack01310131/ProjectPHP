<?php
require("Config/GoogleChart.php");

require("sql/linksql.php");

// $link= @mysqli_connect(
// 		'localhost',
// 		'root',
// 		'21427jack',
// 		'phpproject');
/*銷售分析*/
mysqli_query($link,'SET NAMES utf8');
echo "<a href = 'logout.php' >登出</a><br/>";
echo "<a href = 'Order_overview.php' >檢視訂單</a><br/>";
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
echo "<br/>";


/*時間分析*/
$data = array();
$labels = array();
$legends = array();
$result=mysqli_query($link," SELECT COUNT(GetTimeHours) as T_time FROM invoice");
while ($row=mysqli_fetch_assoc($result)) {
	$T_time=$row['T_time'];
}
$result=mysqli_query($link," SELECT GetTimeHours, COUNT(GetTimeHours) as time FROM invoice GROUP BY GetTimeHours");
while($row=mysqli_fetch_assoc($result))
{
	echo "時間：".$row['GetTimeHours']."點 次數：".$row['time']."<br/>";
	$Percent=(round($row['time']/$T_time,2)*100)."%";
	array_push($data,$row['time']);
	array_push($labels,$Percent);
	array_push($legends,($row['GetTimeHours']."點~".($row['GetTimeHours']+1)."點"));
}
echo "總出單數：".$T_time."<br/>";
$chart = new GooglePieChart(500,300);
$chart->setData($data,$labels,$legends);
$chart->draw();
echo "<br/>";

/*客群分析*/
$data = array();
$labels = array();
$legends = array();
$result=mysqli_query($link," SELECT COUNT(code) as T_time FROM invoice");
while ($row=mysqli_fetch_assoc($result)) {
	$T_time=$row['T_time'];
}
$result=mysqli_query($link," SELECT job, COUNT(invoice.code) as time FROM invoice,member WHERE invoice.Member_Code = member.code GROUP BY job");
while($row=mysqli_fetch_assoc($result))
{
	echo "職業：".$row['job']."點 次數：".$row['time']."<br/>";
	$Percent=(round($row['time']/$T_time,2)*100)."%";
	array_push($data,$row['time']);
	array_push($labels,$Percent);
	array_push($legends,($row['job']));
}
echo "總出單數：".$T_time."<br/>";
$chart = new GooglePieChart(500,300);
$chart->setData($data,$labels,$legends);
$chart->draw();
echo "<br/>";
/*隨機點餐重選率分析*/
$data = array();
$labels = array();
$legends = array();

$result=mysqli_query($link,"SELECT Name,ProductCode,COUNT(ProductCode) as time FROM ramdom,product WHERE product.Code=ramdom.ProductCode GROUP BY ProductCode");
$result2=mysqli_query($link,"SELECT ProductCode,COUNT(ProductCode) as retime FROM ramdom WHERE RamdomChange='重選' GROUP BY ProductCode");
$n=0;
while($row=mysqli_fetch_assoc($result2) ){
	$recode[$n]=$row['ProductCode'];
	$retime[$n]=$row['retime'];
	$n++;
}
$i=$n;
$n=0;
while($row=mysqli_fetch_assoc($result))
{	
	echo "名稱：".$row['Name']." 選取次數：".$row['time']." 重選次數：";
	if($n<$i && $row['ProductCode']==$recode[$n]){
		$changetime=$retime[$n];
		echo $changetime;
		$n++;
	}else{
		$changetime=0;
		echo $changetime;
	}
	@$Percent=(round($changetime/$row['time'],2)*100)."%";
	echo " 重選率：".$Percent."<br/>";

}
echo "<br/>";
mysqli_close($link);
?>