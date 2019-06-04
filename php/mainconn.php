
<?php

$querycountusers =  "SELECT COUNT(*) as datos FROM `users`";
$querycountenters = "SELECT COUNT(*) as datos FROM `reg` WHERE day_work =CURDATE()";
$querycountexits =  "SELECT COUNT(*) as datos FROM `reg` WHERE day_work =CURDATE() AND exit_time != 0";


class MysqlConn
{
  protected $servername = "localhost";
  protected $username = "root";
  protected $password = "";
  protected $db = "qrcamdb";
  protected $conn;

  function __construct()
  {
    $this->conn = new mysqli($this->servername, $this->username, $this->password,$this->db);
  }
  // Check connection
  function CheckConection()
  {
    if ($this->conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        return false;
    }else {
      return true;
    }
  }

function ExecuteQuery($value)
{
  $result = $this->conn->query($value);
/*  while($row = mysqli_fetch_array($result))
       {
          print_r($row);
       }*/
       $data  = array();

       while( $row = $result->fetch_array(MYSQLI_ASSOC)) {
         $dataArray = array();
           $data[] = $row;
       }

       echo json_encode($data);

}

function ExecuteQueryx($value)
{
  $result = $this->conn->query($value);
/*  while($row = mysqli_fetch_array($result))
       {
          print_r($row);
       }*/
}

function QueryEcho($query)
{
  // code...
  $result = $this->conn->query($query);

  $row=mysqli_fetch_row($result);

  echo $row[0];
}

function FunctionName($usr,$pass)
{
  $user = false;
  // code...
  $result = $this->conn->query("SELECT * FROM users WHERE id='$usr' && pass='$pass' limit 1");

  if ($result->num_rows > 0) {
    // code...
  $user = true;

  } else {
    // code...
    $user = 0;
  }

  return $user;
}

function RegisterUser($id,$Nombre, $Apellidos, $Puesto, $Telefono , $Grado ,$Email)
{
  // code...
$result = $this->conn->query("INSERT INTO `users` (`id`, `firstname`, `lastname`, `grade` ,`stall` ,`tel`,`email`) VALUES ('$id','$Nombre','$Apellidos','$Grado','$Puesto','$Telefono','$Email')");
return($result);
}

function UpdateUser($id,$Nombre, $Apellidos, $Puesto, $Telefono ,$Grado,$Email)
{
  // code...
$result = $this->conn->query("UPDATE `users` SET `firstname` = '$Nombre', `lastname` = '$Apellidos', `grade` = '$Grado', `stall` = '$Puesto', `tel` = '$Telefono', `email` = '$Email' WHERE id = '$id'");
return($result);
}



public function RegisterToday($usr)
{
  // code...

$result = 0;

// check if user exists

$uservalidate = $this->conn->query("SELECT * FROM  users WHERE id = '$usr' "); // check if user is register today;


if ($uservalidate->num_rows > 0) {
  // code...
  $result0 = $this->conn->query("SELECT * FROM reg WHERE userfk = '$usr'  AND  day_work = CURRENT_DATE()"); // check if user is register today;

  if ($result0->num_rows > 0) {    // code...

    //check if have 2 exits
    $result1 = $this->conn->query("SELECT * FROM reg WHERE userfk = '$usr'  AND  day_work = CURRENT_DATE() AND exit_time = '0000-00-00 00:00:00'"); // check if user is register today;

    if ($result1->num_rows > 0) {
      // code...
      $result = $this->conn->query("UPDATE `reg` SET  `exit_time`= CURRENT_TIMESTAMP WHERE userfk = '$usr' AND day_work = CURRENT_DATE()"); //if exist reg today
    }else {
      // code...
      $result = 3;
    }

  }else {
    // code...
    $result = $this->conn->query("INSERT INTO `reg` ( `userfk` , `day_work`) VALUES ('$usr',CURRENT_DATE())"); // if not exist today

  }

}

  return($result);
}



function RegisterBook($Isbn,$Titulo,$Autor,$Existencia,$Lugar,$Paginas,$Precio,$Publicacion)
{
  // code...
$result = $this->conn->query("INSERT INTO `books` (`ISBN`, `Title`, `Authors`, `Quantity`, `Slot`,  `Pages`, `Price`, `PubDate`) VALUES ('$Isbn','$Titulo','$Autor','$Existencia','$Lugar','$Paginas','$Precio','$Publicacion')");
return($result);
}

function ApartBook($ISBN, $usr)
{
  // code...
  $result = $this->conn->query("INSERT INTO `borrowedbooks` (`IDprestamo`, `fkbook`, `fkuser`, `date`, `datedelivery`, `estate`) VALUES (NULL, '$ISBN', '$usr', CURRENT_TIMESTAMP, NULL, 'PRESTADO')");
  $result0 = $this->conn->query("UPDATE `books` SET `Quantity` = Quantity-1 WHERE `books`.`ISBN` = '$ISBN'");

if ($result == $result0) {
  // code...
  return true;
}
else {
  // code...
  return false;
}

}

function CheckBook($ISBN, $usr)
{
  // code...
  $result = $this->conn->query("SELECT * FROM borrowedbooks WHERE fkbook='$ISBN' && fkuser='$usr' limit 1");

  $book = 0;

  if ($result->num_rows > 0) {
    // code...
  $book = true;

  } else {
    // code...
    $book = 0;
  }

return $book;
}

function ChangePass($usr,$pass)
{
  // code...
  $result = $this->conn->query("UPDATE `users` SET `Pass` = '$pass' WHERE `users`.`ID` = '$usr'");

  return $result;
}


function UpdatePass($usr,$ISBN)
{
  // code...
  $rows = $this->conn->query("SELECT * FROM borrowedbooks WHERE fkbook='$ISBN' && fkuser='$usr'");

  if ($rows->num_rows > 0) {
    // code...
    $result = $this->conn->query("DELETE FROM `borrowedbooks` WHERE fkbook = '$ISBN' && fkuser = '$usr'");
  $result0 = $this->conn->query("UPDATE `books` SET `Quantity` = Quantity+1 WHERE `books`.`ISBN` = '$ISBN'");
  if ($result == $result0) {
    // code...
    return true ;
  }else {
    // code...
    return false;
  }
  }else {
    // code...
    return false;
  }
}


function UpdateBook($ISBN, $Titulo,$Autor,$Existencia,$Lugar,$Paginas,$Precio,$Publicacion)
{
  // code...
  $rows = $this->conn->query("SELECT * FROM books WHERE ISBN='$ISBN'");

  if ($rows->num_rows > 0) {
    // code...
  $result = $this->conn->query("UPDATE `books` SET  `Title` = '$Titulo', `Authors` = '$Autor', `Quantity` = '$Existencia', `Slot` = '$Lugar',  `Pages` = '$Paginas', `Price` = '$Precio',
                               `PubDate` = '$Publicacion'   WHERE `books`.`ISBN` = '$ISBN'");
  if ($result== true) {
    // code...
    return true;
  }else {
    // code...
    return false;
  }
  }else {
    // code...
    return false;
  }
}

function DeleteBook($ISBN)
{
  // code...
  $rows = $this->conn->query("SELECT * FROM books WHERE ISBN='$ISBN'");

  if ($rows->num_rows > 0) {
    // code...
    $result = $this->conn->query("DELETE FROM `books` WHERE `books`.`ISBN` ='$ISBN'" );

    if ($result== true) {
      // code...
      return true;
    }else {
      // code...
      return false;
    }

  }else {
    // code...
    return false;
  }


}

function DeleteUser($Id)
{
  // code...
  $rows = $this->conn->query("SELECT * FROM users WHERE ID='$Id'");

  if ($rows->num_rows > 0) {
    // code...
    $result = $this->conn->query("DELETE FROM `users` WHERE `users`.`ID` ='$Id'" );

    if ($result== true) {
      // code...
      return true;
    }else {
      // code...
      return false;
    }

  }else {
    // code...
    return false;
  }

}
}
?>
