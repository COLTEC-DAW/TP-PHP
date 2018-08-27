<!DOCTYPE html>
<html lang="pt" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>DAW Eventos</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"
    integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
  </head>
  <body style="background-color: #99CED4;">
    <div class="wrapper">
        <?php require "../incs/menu.inc"; ?>

        <div class="jumbotron jumbotron-fluid col-10 p-3 offset-1">
          <div class="container">
            <h1 class="display-4">Ótimo</h1>
            <p class="lead">Já estamos quase lá! Preencha os dados abaixo para concluir a compra</p>
          </div>
        </div>

        <div class="offset-md-1 offset-lg-1 col-sm-12 col-md-10 col-lg-10" >
          <div class="row">
            <div class=" col-sm-12 col-md-10 col-lg-6">
              <div class="card">
                <div class="card-header">
                  <h3>Sua compra</h3>
                </div>
                <div class="card-body">
                    <?php session_start();
                    $login = $_SESSION['login'];
                    $mysqli = new mysqli('localhost', 'user', 'user', 'tpphp') or die("Unable to connect");
                    $sql = "SELECT * FROM ingressos WHERE users_login = '$login';";
                    $result = $mysqli->query($sql) or die($mysqli->error);
                    for ($i = 0; $i < $result->num_rows; $i++) : ?>
                        <?php
                            $result->data_seek($i);
                            $row = $result->fetch_assoc();
                        ?>
                        <div class="row">
                        <div class="col-4 d-none d-lg-flex col-lg-4">
                          <img src="imgs/festeja.jpg"  width="100" height="125">
                        </div>
                        <div class="col-8 col-sm-12 col-lg-8">
                          <p><?php echo $row['name']; ?></p>
                          <p><?php echo $row['price']; $total += $row['price'];?></p>
                        </div>
                      </div>
                  <?php endfor; ?>
              </div>
                <div class="card-footer">
                  <div class="row">
                    <div class="col-6">
                      <h3>Total:<?php echo $total; ?></h3>
                    </div>
                    <div class="col-6">
                      <h3>R$ </h3>
                      </div>
                    </div>
                  </div>
                </div>
              </div>


              <div class="col-6 col-lg-6">
                <div class="row">
                  <h2>Dados Pessoais</h2>
                </div>
                <form>
                  <div class="form-group row">
                    <label for="Nome" class="col-sm-2 col-form-label">Nome</label>
                    <div class="col-sm-10">
                      <input type="name" class="form-control" id="Nome" placeholder="Nome">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                      <input type="name" class="form-control" id="email" placeholder="Email">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="cpf" class="col-sm-2 col-form-label">CPF</label>
                    <div class="col-sm-10">
                      <input type="number" class="form-control" id="cpf" placeholder="000.000.000-00">
                    </div>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck1">
                    <label class="form-check-label" for="gridCheck1">Desejo receber e-mails</label>
                  </div>
                  <div class="row">
                    <h2>Dados do Cartão</h2>
                  </div>
                  <div class="form-group row">
                    <label for="nc" class="col-sm-2 col-form-label">Número do cartão</label>
                    <div class="col-sm-10">
                      <input type="number" class="form-control" id="nc" placeholder="XXXX XXXX XXXX XXXX">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="val" class="col-sm-2 col-form-label">Validade</label>
                    <div class="col-sm-10">
                      <input type="name" class="form-control" id="val" placeholder="MM/AAAA">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="cvv" class="col-sm-2 col-form-label">CVV</label>
                    <div class="col-sm-10">
                      <input type="number" class="form-control" id="cvv" placeholder="XXX">
                    </div>
                  </div>
                </form>
                <button type="button" class="btn btn-success btn-lg btn-block">Comprar</button>
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                </div>
              </div>
            </div>
          </div>
          <div class="push"></div>
        </div>
        <?php mysqli_close($mysqli); ?>
        <?php require "../incs/rodape.inc"; ?>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
  </body>
</html>
