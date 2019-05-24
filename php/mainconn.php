
<?php

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

function RegisterUser($CURP,$Nombre, $Apellidos, $Email,$Telefono,$Direccion,$Pass)
{
  // code...
$result = $this->conn->query("INSERT INTO `users` (`ID`, `Name`, `LastName`, `Email`, `Tel`, `Addres`, `Pass`) VALUES ('$CURP','$Nombre','$Apellidos', '$Email','$Telefono','$Direccion','$Pass')");
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
