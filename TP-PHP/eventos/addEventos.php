<?php
  $name = $_POST['name'];
  $place = $_POST['place'];
  $description = $_POST['description'];
  $price = $_POST['price'];
  $importance = $_POST['importance'];
  $mysqli = new mysqli('localhost', 'user', 'user', 'tpphp') or die("Unable to connect");
  $sql = "INSERT INTO events (name, place, description, price, importance) VALUES
    ('$name','$place','$description','$price', '$importance')";
  $mysqli->query($sql) or die($mysqli->error);
  mysqli_close($mysqli);
  header("location: ../eventos/index.php");
?>
