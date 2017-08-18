<?php session_start();
include "INC/funcoes.inc";
userRefresh(); ?>
<!-- Página do perfil do usuário. Mostra o nome, mesas, avaliação e tags -->
<!DOCTYPE>
<html>
    <head>
        <title>Perfil</title>
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
                <?php listaMesasUsuario(); ?>
            </div>
            <div class="sidebar col-sm-3">
                <h2>Suas notificações:</h2>
                <ul>
                    <li>Horário de <a href="pgMesa.php">Mesa 1</a> foi alterado</li>
                    <li>Jogador _D4rk_S0rc3r3r_ saiu da <a href="pgMesa.php">Mesa 3</a></li>
                    <li>O mestre Krysvera te convidou para a <a href="pgMesa.php">Mesa 4</a></li>
                </ul>
            </div>
        </div>
        <div class="footer">
            <?php include "INC/footer.inc"; ?>
        <div>
    </body>
</html>