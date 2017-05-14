<?php
session_start();
require("sql/linksql.php");
// $link= @mysqli_connect(
// 		'localhost',
// 		'root',
// 		'21427jack',
// 		'phpproject');

mysqli_query($link,'SET NAMES utf8');
$result=mysqli_query($link," SELECT * FROM invoice ");

while ($row=mysqli_fetch_assoc($result) )
{
	if ($row['status']=="no")
	{
		$NeedPrice=0;
		echo "第 ".$row['Code']."筆訂單";
		echo "&nbsp&nbsp會員編號：".$row['Member_Code']."&nbsp&nbsp取餐時間：".$row['Recipient_GetTime']."&nbsp&nbsp地址：".$row['Recipient_Address'];
		echo "&nbsp&nbsp<a href='Config/finshOrder.php?Code=$row[Code]'>完成</a>&nbsp&nbsp<a href='Config/delOrder.php?Code=$row[Code]'>刪除</a><br/>";
		echo "餐點內容：<br/>";
		$ICode=$row['Code'];
		$result2=mysqli_query($link," SELECT * FROM list WHERE invoice_Code = '$ICode' ");
		while ($row2=mysqli_fetch_assoc($result2) )
		{
			$PCode=$row2['Produce_Code'];
			$result3=mysqli_query($link," SELECT * FROM product WHERE Code='$PCode' ");
			while ($row3=mysqli_fetch_assoc($result3)) 
			{
				echo $row3['Name'];
			}
			echo "     ".$row2['Total_Amount']."    ".$row2['Remarks']."<br/>";
			$NeedPrice+=$row2['Total_Sum'];
		}
		echo "<br/>總金額：".$NeedPrice."<br/><br/>";
	}
}

mysqli_close($link);
?>