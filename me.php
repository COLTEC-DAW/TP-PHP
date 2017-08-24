<?php session_start();
include "INC/funcoes.inc";
userRefresh(); ?>
<!-- Página do perfil do usuário. Mostra o nome, mesas, avaliação e tags -->
<!DOCTYPE>
<html>
    <head>
        <title>Meu Perfil</title>
        <link rel="stylesheet" type="text/css" href="STYLE/style.css"></link>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <meta charset=utf-8>
    </head>
    <body>
        <div class="container-fluid">
            <?php require "INC/userSideBar.inc"; ?>
            <div class="col-sm-7 centerbar">
                <div class="title">
                    <h2 class="center fonteBranca">Minhas mesas:</h2>
                </div>
                <?php listaMesasUsuario($_SESSION["user"]); ?>
            </div>
            <?php include "INC/notificacoes.inc"; ?>
        </div>
        <div class="footer">
            <?php include "INC/footer.inc"; ?>
        <div>
    </body>
</html>