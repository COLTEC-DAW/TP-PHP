<?php
  $name = $_POST['name'];
  $place = $_POST['place'];
  $description = $_POST['description'];
  $price = $_POST['price'];
  $mysqli = new mysqli('localhost', 'zen', '123', 'tp_php') or die("Unable to connect");
  $sql = "INSERT INTO events (name, place, description, price) VALUES
    ('".$name."','".$place."','".$description."',".$price.")";
  echo $sql;
  $mysqli->query($sql) or die($mysqli->error);
  mysqli_close($mysqli);
  header("location:index.php");
?>
