<?php

include 'mainconn.php';
$Mysql = new MysqlConn;

$Mysql->ExecuteQuery("SELECT id,userfk,DATE_FORMAT(enter_time,'%H:%i:%s') as enter_time, DATE_FORMAT(exit_time,'%H:%i:%s') as exit_time ,day_work FROM reg");

 ?>
