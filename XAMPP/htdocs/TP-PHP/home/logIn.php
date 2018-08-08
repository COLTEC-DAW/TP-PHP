<?php
  if(empty($_POST['login']) || empty($_POST['password'])) {
    header("location:index.php");
  }
  session_start();
  if($_POST['login'] == "admin" && $_POST['password'] == "admin") {
    $_SESSION['login'] = $_POST['login'];
    $_SESSION['password'] = $_POST['password'];
    $_SESSION['userType'] = "admin";
    header("location:index.php");
  } else {
    $user = 'zen';
    $pass = '123';
    $db = 'tp_php';
    $mysqli = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect");
    $_SESSION["db"] = $db;
    $login = $_POST['login'];
    $password = $_POST['password'];
    $result = $mysqli->query("SELECT login FROM users WHERE login = $login AND password = $password") or die("Unable to reach db - select");
    echo "Reverse order...\n";
    if($result->num_rows > 0) {
      $_SESSION['login'] = $login;
      $_SESSION['password'] = $password;
      $_SESSION['userType'] = "user";
      header('location:index.php');
    } else {
      unset($_SESSION['login']);
      unset($_SESSION['password']);
      unset($_SESSION['userType']);
      session_destroy();
      header('location:index.php');
    }
  }
?>
