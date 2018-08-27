<!DOCTYPE html>
<html lang="pt" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>DAW Eventos</title>
    <link rel="shortcut icon" href="imgs/favicon.ico" />
    <link rel="stylesheet" href="../styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"
    integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
  </head>
  <body style="background-color: #99CED4;">
    <div class="wrapper">
      <?php
        require "../incs/menu.inc";
      ?>
      <div class="col-12">
        <?php
          $mysqli = new mysqli('localhost', 'user', 'user', 'tpphp') or die("Unable to connect");
          $result = $mysqli->query("SELECT * FROM events");
          $eventosPrincipais = array();
          for ($i = 0; $i < $result->num_rows; $i++){
            $result->data_seek($i);
            $row = $result->fetch_assoc();
            if($row["importance"] == 2){
              array_push($eventosPrincipais, $row);
            }
          }
        ?>
        <div id="carouselPrincipal" class="carousel pt-3 slide col-10 offset-1" data-ride="carousel">
          <div class="carousel-inner">
            <?php if(sizeof($eventosPrincipais)  > 0) : ?>
              <div class="carousel-item active">
                <figure class="figure w-100">
                  <form class="form-group" action="../item/index.php" method="get">
                    <button class="btn btn-dark" type="submit">
                      <img class="w-100 col-12" style="height: 600px;" src="imgs/villamix.jpg" alt="slide">
                    </button>
                    <input type="hidden" name="eventName" value="<?php $evento = $eventosPrincipais[0]; echo $evento["name"]; ?>">
                    <input type="hidden" name="eventPrice" value="<?php echo $evento["price"]; ?>">
                    <input type="hidden" name="eventDescription" value="<?php echo $evento["description"]; ?>">
                    <input type="hidden" name="eventPlace" value="<?php echo $evento["place"]; ?>">
                    <figcaption class="figure-caption"><?php echo $evento["name"] ?></figcaption>
                  </form>
                </figure>
              </div>
            <?php endif; ?>
            <?php for ($i = 1; $i < sizeof($eventosPrincipais); $i++) : ?>
              <div class="carousel-item">
                <figure class="figure w-100">
                  <form class="form-group" action="../item/index.php" method="get">
                    <button class="btn btn-dark" type="submit">
                      <img class="w-100 col-12" style="height: 600px;" src="imgs/villamix.jpg" alt="slide">
                    </button>
                    <input type="hidden" name="eventName" value="<?php $evento = $eventosPrincipais[$i]; echo $evento["name"]; ?>">
                    <input type="hidden" name="eventPrice" value="<?php echo $evento["price"]; ?>">
                    <input type="hidden" name="eventDescription" value="<?php echo $evento["description"]; ?>">
                    <input type="hidden" name="eventPlace" value="<?php echo $evento["place"]; ?>">
                    <figcaption class="figure-caption"><?php echo $evento["name"] ?></figcaption>
                  </form>
                </figure>
              </div>
            <?php endfor; ?>
          </div>
          <a class="carousel-control-prev" href="#carouselPrincipal" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselPrincipal" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
      <div class="col-12 p-3">
        <?php
          $eventosSecundarios = array();
          for ($i = 0; $i < $result->num_rows; $i++){
            $result->data_seek($i);
            $row = $result->fetch_assoc();
            if($row["importance"] == 1) {
              array_push($eventosSecundarios, $row);
            }
          }
        ?>
        <div id="carouselSecundario" class="carousel slide col-10 offset-1" data-interval="false">
          <div class="carousel-inner">
            <?php if (sizeof($eventosSecundarios) > 0) : ?>
              <div class="carousel-item active">
                <figure class="offset-1 figure w-100 col-2">
                  <form class="form-group" action="../item/index.php" method="get">
                    <button class="btn btn-dark" type="submit">
                      <img class="w-100 col-12" style="height: 150px;" src="imgs/villamix.jpg" alt="slide">
                    </button>
                    <input type="hidden" name="eventName" value="<?php $evento = $eventosSecundarios[0]; echo $evento["name"]; ?>">
                    <input type="hidden" name="eventPrice" value="<?php echo $evento["price"]; ?>">
                    <input type="hidden" name="eventDescription" value="<?php echo $evento["description"]; ?>">
                    <input type="hidden" name="eventPlace" value="<?php echo $evento["place"]; ?>">
                    <figcaption class="figure-caption"><?php echo $evento["name"]?></figcaption>
                  </form>
                </figure>
                <?php for ($i = 1; $i < sizeof($eventosSecundarios) && $i < 5; $i++) : ?>
                  <figure class="figure w-100 col-2">
                    <form class="form-group" action="../item/index.php" method="get">
                      <button class="btn btn-dark" type="submit">
                        <img class="w-100 col-12" style="height: 150px;" src="imgs/villamix.jpg" alt="slide">
                      </button>
                      <input type="hidden" name="eventName" value="<?php $evento = $eventosSecundarios[$i]; echo $evento["name"]; ?>">
                      <input type="hidden" name="eventPrice" value="<?php echo $evento["price"]; ?>">
                      <input type="hidden" name="eventDescription" value="<?php echo $evento["description"]; ?>">
                      <input type="hidden" name="eventPlace" value="<?php echo $evento["place"]; ?>">
                      <figcaption class="figure-caption"><?php echo $evento["name"]?></figcaption>
                    </form>
                  </figure>
                <?php endfor; ?>
              </div>
            <?php endif; ?>
            <?php for ($i = 5; $i < sizeof($eventosSecundarios); $i = $i + 5) : ?>
              <div class="carousel-item offset-1">
                <?php for ($j = $i; $j < sizeof($eventosSecundarios) && $j < $i + 5; $j++) : ?>
                  <figure class="figure w-100 col-2">
                    <form class="form-group" action="../item/index.php" method="get">
                      <button class="btn btn-dark" type="submit">
                        <img class="w-100 col-12" style="height: 150px;" src="imgs/villamix.jpg" alt="slide">
                      </button>
                      <input type="hidden" name="eventName" value="<?php $evento = $eventosSecundarios[$j]; echo $evento["name"]; ?>">
                      <input type="hidden" name="eventPrice" value="<?php echo $evento["price"]; ?>">
                      <input type="hidden" name="eventDescription" value="<?php echo $evento["description"]; ?>">
                      <input type="hidden" name="eventPlace" value="<?php echo $evento["place"]; ?>">
                      <figcaption class="figure-caption"><?php echo $evento["name"]?></figcaption>
                    </form>
                  </figure>
                <?php endfor; ?>
              </div>
            <?php endfor; ?>
          </div>
          <a class="carousel-control-prev" href="#carouselSecundario" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselSecundario" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
      <div class="push"></div>
    </div>
    <?php mysqli_close($mysqli); ?>
    <?php require "../incs/rodape.inc" ?>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
  </body>
</html>
