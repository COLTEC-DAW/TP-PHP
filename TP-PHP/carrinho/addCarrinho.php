<?php
  session_start();
  $name = $_POST['eventName'];
  $price = $_POST['eventPrice'];
  $description = $_POST['eventDescription'];
  $place = $_POST['eventPlace'];
  $mysqli = new mysqli('localhost', 'user', 'user', 'tpphp') or die("Unable to connect");
  $sql = "SELECT id FROM events WHERE name = '$name' AND price = '$price' AND description = '$description' AND place = '$place';";
  $result = $mysqli->query($sql) or die($mysqli->error);
  $result->data_seek(0);
  $row = $result->fetch_assoc();
  $login = $_SESSION['login'];
  $id = $row['id'];
  $sql = "INSERT INTO ingressos (users_login, events_id, quantity, payment) VALUES ('$login','$id', 0, false);";
  $mysqli->query($sql) or die($mysqli->error);
  mysqli_close($mysqli);
  header("location: ../carrinho/index.php");
?>
