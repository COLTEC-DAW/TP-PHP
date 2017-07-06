<?php
ob_start();
session_start();
require "INC/mesas.inc";?>
<!-- Página principal. Mostra o usuário logado, as notificaçÕes dele, sua mesas, a busca de mesas e a opção de criar mesas -->

<!-- SÓ FUNCIONA COM O FAKER NA PASTA ESPECIFICADA -->
<!-- Precisamos melhorar *demais* o CSS -->
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
            <div class="sidebar col-sm-2">
                <div class="title">
                    <!-- Essa seção tá bagunçada
                            Eu queria foto, nome à direita da foto e link embaixo -->
                    <div class="card">
                        <img src="STYLE/fotaPerfil.jpeg" alt="Avatar" style="width:100%">
                        <div class="container">
                            <h4 class="fonteBranca"><b>Shoveler</b></h4>
                        </div>
                    </div>
                    <!--<img src="fotaPerfil.jpeg" class="ftPerfil">                
                    <h3 class="nomePerfil">Shoveler</h3>-->
                    <div class="perfil">
                        <form class="pagePerfil" method="get" action="me.php">
                            <button type="submit">Ver perfil</button>
                        </form>
                        <h3>Minhas mesas:</h3>
                        <ul>
                            <li><a href="pgMesa.php">Mesa 1</a></li>
                            <li><a href="pgMesa.php">Mesa 2</a></li>
                            <li><a href="pgMesa.php">Mesa 3</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-7">
                <form method="get" action="novaMesa.php">
                    <button type="submit">Criar mesa</button>
                </form>
                <div class="title">
                    <h2 class="center">Mesas na área:</h2>
                </div>
                <?php listaMesas(); ?>
            </div>
            <div class="sidebar col-sm-3">
                <div class="title">
                <h2>Suas notificações:</h2>
                <ul>
                    <li>Horário de <a href="pgMesa.php">Mesa 1</a> foi alterado</li>
                    <li>Jogador _D4rk_S0rc3r3r_ saiu da <a href="pgMesa.php">Mesa 3</a></li>
                    <li>O mestre Krysvera te convidou para a <a href="pgMesa.php">Mesa 4</a></li>
                </ul>
                </div>
            </div>
        </div>
    </body>
    <?php include "INC/footer.inc"; ?>
</html>