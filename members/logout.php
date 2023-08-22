<?php 
setcookie("id", "", time() - 3600, "/");
setcookie("name", "", time() - 3600, "/");
setcookie("username", "", time() - 3600, "/");
setcookie("email", "", time() - 3600, "/");
setcookie("password", "", time() - 3600, "/");
setcookie("gender", "", time() - 3600, "/");
setcookie("image", "", time() - 3600, "/");
setcookie("status", "", time() - 3600, "/");
setcookie("type", "", time() - 3600, "/");

  session_start();
    session_unset();
  session_destroy();
   $_SESSION['type'] = null;
 header("Location: ../index.php");


 ?>