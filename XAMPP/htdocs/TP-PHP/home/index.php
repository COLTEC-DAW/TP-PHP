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
  <body>
    <div class="wrapper">
      <?php
        require "../incs/menu.inc";
        isMenuSet();
      ?>
      <div class="col-12">
        <div id="carouselPrincipal" class="carousel pt-3 slide col-10 offset-1" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselPrincipal" data-slide-to="0" class="active"></li>
            <li data-target="#carouselPrincipal" data-slide-to="1"></li>
            <li data-target="#carouselPrincipal" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img class="d-block w-100" style="height: 600px;" src="imgs/villamix.jpg" alt="slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" style="height: 600px;" src="imgs/festeja.jpg" alt="slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" style="height: 600px;" src="imgs/happyholi.jpg" alt="slide">
            </div>
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
        <div id="carouselSecundario" class="carousel slide col-10 offset-1" data-interval="false">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img class="offset-1 w-100 col-2" style="height: 150px;" src="imgs/villamix.jpg" alt="slide">
              <img class="w-100 col-2" style="height: 150px;" src="imgs/villamix.jpg" alt="slide">
              <img class="w-100 col-2" style="height: 150px;" src="imgs/villamix.jpg" alt="slide">
              <img class="w-100 col-2" style="height: 150px;" src="imgs/villamix.jpg" alt="slide">
              <img class="w-100 col-2" style="height: 150px;" src="imgs/villamix.jpg" alt="slide">
            </div>
            <div class="carousel-item">
              <img class="offset-1 w-100 col-2" style="height: 150px;" src="imgs/villamix.jpg" alt="slide">
              <img class="w-100 col-2" style="height: 150px;" src="imgs/villamix.jpg" alt="slide">
              <img class="w-100 col-2" style="height: 150px;" src="imgs/villamix.jpg" alt="slide">
              <img class="w-100 col-2" style="height: 150px;" src="imgs/villamix.jpg" alt="slide">
              <img class="w-100 col-2" style="height: 150px;" src="imgs/villamix.jpg" alt="slide">
            </div>
            <div class="carousel-item">
              <img class="offset-1 w-100 col-2" style="height: 150px;" src="imgs/villamix.jpg" alt="slide">
              <img class="w-100 col-2" style="height: 150px;" src="imgs/villamix.jpg" alt="slide">
              <img class="w-100 col-2" style="height: 150px;" src="imgs/villamix.jpg" alt="slide">
              <img class="w-100 col-2" style="height: 150px;" src="imgs/villamix.jpg" alt="slide">
              <img class="w-100 col-2" style="height: 150px;" src="imgs/villamix.jpg" alt="slide">
            </div>
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
    <?php require "../incs/rodape.inc" ?>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
  </body>
</html>
