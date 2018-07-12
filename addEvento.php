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
        <?php require "menu.inc" ?>
        <div class="card col-10 offset-1">
            <div class="card-header row">
                <h3>Adicionar Evento</h3>
            </div>
            <div class="card-body">
                <form class="form-group" action="index.html" method="post">
                    <div class="row p-3">
                        <h5 class="card-title col-3">Nome do evento</h5>
                        <input type="name" class="col-9" name="nome">
                    </div>
                    <div class="row p-3">
                        <h5 class="card-title col-3">Local do evento</h5>
                        <input type="name" class="col-9" name="local">
                    </div>
                    <div class="row p-3">
                        <h5 class="card-title col-3">Data do evento</h5>
                        <input type="name" class="col-9" name="data">
                    </div>
                    <div class="row p-3">
                        <h5 class="card-title col-3">Preço do ingresso</h5>
                        <input type="number" class="col-9" name="precos">
                    </div>
                </form>
            </div>
            <div class="card-footer">
                <button type="submit" name="pagamento" class="btn btn-success float-right">Adicionar</button>
            </div>
        </div>
      </div>
      <div class="push"></div>
      <?php require "rodape.inc" ?>

      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    </body>
  </html>
