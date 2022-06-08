<?php
$id=$_GET["id"];
//连接上数据库
include("./mysql_connect.php");	
$sql="select * from 汇总数据 where id='$id'";
$result=mysqli_query($con,$sql);
while($row=$result->fetch_array()){
    $obj = json_encode($row);
}
header('Content-Type:application/json; charset=utf-8');
echo $obj;
?>