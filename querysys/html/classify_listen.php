<?php
    //调用$con
    include('../mysql_connect.php');
    //获取参数
    $pid=$_GET['pid'];
    $sql = "select 标题 from 汇总数据 where id = '{$pid}'";
    $res = mysqli_query($con,$sql);
    $title = mysqli_fetch_array($res)[0];
    //返回相关值
    echo $title;
?>