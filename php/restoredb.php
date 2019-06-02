<?php
//Introduzca aquí la información de su base de datos y el nombre del archivo de copia de seguridad.
$mysqlDatabaseName ='qrcamdb';
$mysqlUserName ='root';
$mysqlPassword ='';
$mysqlHostName ='localhost';
$mysqlImportFilename ='respaldo.sql';


//Por favor, no haga ningún cambio en los siguientes puntos
//Importación de la base de datos y salida del status
$command='mysql -h' .$mysqlHostName .' -u' .$mysqlUserName .' -p' .$mysqlPassword .' ' .$mysqlDatabaseName .' < ' .$mysqlImportFilename;
exec($command,$output=array(),$worked);
switch($worked){
case 0:
printf(0);
break;
case 1:
printf(1);
break;
}
?>
