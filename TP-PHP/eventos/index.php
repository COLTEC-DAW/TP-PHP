<html lang="pt" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>DAW Eventos</title>
    <link rel="stylesheet" href="../styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"
    integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
  </head>
  <body style="background-color: #99CED4;">
    <div class="wrapper">
      <?php
        require "../incs/menu.inc";
      ?>
      <div class="p-3">
        <?php
          $mysqli = new mysqli('localhost', 'user', 'user', 'tpphp') or die("Unable to connect");
          $sql = "SELECT * FROM events";
          if (isset($_GET["pesquisa"])) {
            $sql = $sql . " WHERE name LIKE '%" . $_GET["pesquisa"] . "%';";
          }
          $result = $mysqli->query($sql) or die($mysqli->error);
          for ($i = 0; $i < $result->num_rows; $i++) : ?>
            <?php
              $result->data_seek($i);
              $row = $result->fetch_assoc();
            ?>
            <figure class="figure col-3">
              <form class="form-group" action="../item/index.php" method="get">
                <button class="btn btn-dark" type="submit">
                  <img src="imgs/festeja.jpg" class="figure-img img-fluid rounded" alt="itemListed">
                </button>
                <figcaption class="figure-caption text-center"><?php echo $row['name']; ?></figcaption>
                <figcaption class="figure-caption text-center"><?php echo $row['place']; ?></figcaption>
                <figcaption class="figure-caption text-center"><?php echo $row['description']; ?></figcaption>
                <figcaption class="figure-caption text-center">R$ <?php echo $row['price']; ?></figcaption>
                <input type="hidden" name="eventName" value="<?php echo $row["name"]; ?>">
                <input type="hidden" name="eventPrice" value="<?php echo $row["price"]; ?>">
                <input type="hidden" name="eventDescription" value="<?php echo $row["description"]; ?>">
                <input type="hidden" name="eventPlace" value="<?php echo $row["place"]; ?>">
              </form>
            </figure>
        <?php
          endfor;
          mysqli_close($mysqli);
        ?>
      </div>
      <div class="push"></div>
    </div>

    <?php require "../incs/rodape.inc" ?>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
  </body>
</html>
