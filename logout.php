<?php
   session_start();
   unset($_SESSION["id"]);
   unset($_SESSION["role"]);
   session_destroy();
   echo 'You have cleaned session';
   header('Refresh: 2; URL = login.php');
?>