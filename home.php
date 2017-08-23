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
        <link rel="stylesheet" type="text/css" href="STYLE/style.css"></link>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <meta charset=utf-8>
    </head>
    <body>
        <div class="container-fluid">
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