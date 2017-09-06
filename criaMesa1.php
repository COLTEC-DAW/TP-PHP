<?php 
session_start();
//Página para criação de novas mesas
require "classes.php";
userRefresh();
?>
<!DOCTYPE>
<html>
    <head>
        <title>Nova mesa</title>
        <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
        <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
        <link rel="stylesheet" type="text/css" href="STYLE/style.css"></link>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <script>
            $(document).ready(function () {
                $('.dropdown-toggle').dropdown();
        });
        </script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div class="container-fluid">
            <?php
                require "INC/navBar.inc"; 
                require "INC/userSideBar.inc";
            ?>
            <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 centerbar">
                <div class="divisores">
                    <h1>Página para criar novas mesas</h1>
                    <div class="divider"></div>
                    <!--<h2><strong>WORK IN PROGRESS</strong></h2>
                    <h2>Enquanto você não estava olhando, o faker fez o trabalho. Volte e admire os resultados</h2>-->
                    <form action="criaMesa2.php" method="POST">
                        <div class="form-group">
                            <label for="nomeMesa">Nome</label>
                            <input type="text" class="form-control" id="nomeMesa" name="nomeMesa" placeholder="Nome da Mesa">
                        </div>
                        <!--Nome do mestre será passado por POST-->
                        <div class="form-group">
                            <label for="enderecoMesa">Endereço</label>
                            <input type="text" class="form-control" id="enderecoMesa" name="enderecoMesa" placeholder="R. Astolfo, 54 - Bela Vista, São Paulo">
                        </div>
                        <div class="form-group">
                            <label for="generoMesa">Gênero</label>
                            <input type="text" class="form-control" id="generoMesa" name="generoMesa" placeholder="Gênero da Mesa">
                        </div>
                        <div class="form-group">
                            <label for="sistemaMesa">Sistema</label>
                            <input type="text" class="form-control" id="sistemaMesa" name="sistemaMesa" placeholder="Sistema da Mesa">
                        </div>
                        <div class="form-group">
                            <label for="sinopseMesa">Sinopse</label>
                            <textarea rows="4" cols="50" class="form-control" id="sinopseMesa" name="sinopseMesa" placeholder="Sinopse da Mesa"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="privacidade">Privacidade</label>
                            <div id="privacidade">
                                <label class="radio-inline">
                                    <input type="radio" name="privacidadeMesa" id="privacidade1" value="1" checked="checked">Pública
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="privacidadeMesa" id="privacidade2" value="0">Privada
                                </label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btnCriarMesa">Criar mesa</button>
                    </form>
                </div>
            </div>
        </div>    
        <div class="footer">
            <?php include "INC/footer.inc"; ?>
        <div> 
    </body>
</html>