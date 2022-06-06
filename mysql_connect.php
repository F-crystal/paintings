<?php
    //连接数据库
    define('db_host','127.0.0.1');
    define("db_user","root");
    define("db_password","root");
    define("db_db","paintings");
    define("db_port",8889);

    $con = @mysqli_connect(
        db_host,
        db_user,
        db_password,
        db_db,
	    db_port
    )OR die('Could not to connect to Mysql:'.mysqli_connect_error());
    //作为接口方便调用(不用每次都重新连接)
    mysqli_set_charset($con, 'utf8');
?>


