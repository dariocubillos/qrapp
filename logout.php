<?php
    setcookie ("usr", "", time() - 3600);
    setcookie ("pass", "", time() - 3600);
    header("Location:index.html");
 ?>
