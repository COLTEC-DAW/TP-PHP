<?php
ob_start();
session_start();
require "INC/funcoes.inc";
userRefresh(); ?>
<!-- Página principal. Mostra o usuário logado, as notificaçÕes dele, sua mesas, a busca de mesas e a opção de criar mesas -->

<!-- SÓ FUNCIONA COM O FAKER NA PASTA ESPECIFICADA -->
<!DOCTYPE>
<html>
    <head>
        <title>GameMaster</title>
        <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
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
        <meta charset=utf-8>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div class="container-fluid">
            <nav class="navbar navbar-default navbar-static-top withoutBottomMargin withoutBorder">
                <div class="container-reserva sideBar">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="GameMasterFont fontePreta navbar-brand" href="#">GameMaster</a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav navbar-right">
                            <li><a class="fontePreta" href="#">Home</a></li>
                            <li><a class="fontePreta" href="me.php">Perfil</a></li>
                            <li><a class="fontePreta" href="logout.php">Sair</a></li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>
            <? require "INC/userSideBar.inc"; ?>
            <div class="col-sm-12 col-md-7 col-lg-7 centerbar">
                <form method="get" action="novaMesa.php">
                    <button type="submit" class="btn btn-primary btnCriarMesa">Criar mesa</button>
                </form>
                <div class="title">
                    <h2 class="center fonteBranca">Mesas na área:</h2>
                </div>
                <?php listaTodasMesas();?>
            </div>
            <?php include "INC/notificacoes.inc"; ?>
        </div>
        <div class="footer">
            <?php include "INC/footer.inc"; ?>
        <div>
    </body>
</html>