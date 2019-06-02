<?php

include 'mainconn.php';
$Mysql = new MysqlConn;


$Mysql->ExecuteQuery("SELECT id,userfk,DATE_FORMAT(enter_time,'%H:%i:%s') as enter_time, DATE_FORMAT(exit_time,'%H:%i:%s') as exit_time ,day_work, ( SELECT firstname FROM users where users.id = userfk ) as 'Nombre' , (SELECT lastname FROM users where users.id = userfk) as 'Apellidos' FROM reg");

 ?>
