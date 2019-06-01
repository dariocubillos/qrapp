<?php

include 'mainconn.php';
$Mysql = new MysqlConn;

$user = $_POST['usr'];

$Mysql->ExecuteQuery("SELECT * FROM users WHERE id ='$user'");



 ?>
