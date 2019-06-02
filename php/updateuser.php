<?php

include 'mainconn.php';

$Mysql = new MysqlConn;

$nss = $_POST['nss'];
$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$puesto = $_POST['puesto'];
$telefono = $_POST['telefono'];
$grade = $_POST['grado'];
$email = $_POST['email'];


printf($Mysql->UpdateUser($nss,$nombre, $apellidos, $puesto,$telefono,$grade,$email));

 ?>
