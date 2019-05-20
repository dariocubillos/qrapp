<?php

include 'mainconn.php';

$Mysql = new MysqlConn;

$username = $_POST['user'];
$pass = $_POST['pass'];

printf($Mysql->FunctionName($username,$pass));

 ?>
