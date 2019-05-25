<?php
include 'mainconn.php';

$Mysql = new MysqlConn;

$username = $_POST['user'];
$pass = $_POST['newpass'];

printf( $Mysql->ChangePass($username,$pass));


 ?>
