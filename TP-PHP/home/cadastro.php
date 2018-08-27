<?php
  $mysqli = new mysqli('localhost', 'user', 'user', 'tpphp')
    or die("Unable to connect");
  $login = $_POST['login'];
  $password = $_POST['password'];
  $result = $mysqli->query("SELECT * FROM users WHERE login = '$login'")
    or die($mysqli->error);
  if($result->num_rows == 0) {
    session_start();
    $_SESSION['login'] = $login;
    $_SESSION['password'] = $password;
    $name = $_POST['name'];
    $email = $_POST['email'];
    $_SESSION['userType'] = "user";
    $result = $mysqli->query("INSERT INTO users(name, login, password, email) VALUES ('$name', '$login', '$password', '$email')")
      or die($mysqli->error);
    mysqli_close($mysqli);
    header('Location: ../home/index.php');
  } else {
    mysqli_close($mysqli);
    header('Location: ../home/logout.php');
  }
  header("Location: ../home/index.php");
?>
