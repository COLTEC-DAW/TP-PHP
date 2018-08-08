<?php
  session_start();
  unset($_SESSION['login']);
  unset($_SESSION['password']);
  unset($_SESSION['userType']);
  session_destroy();
  header('location:index.php');
?>
