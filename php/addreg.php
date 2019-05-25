<?php

include 'mainconn.php';

$Mysql = new MysqlConn;

$usr = $_POST['usr'];


printf($Mysql->RegisterToday($usr));


 ?>
