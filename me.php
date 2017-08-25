<?php session_start();
require "INC/funcoes.inc";
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
        <div class="container-fluid"> <?php
            require "INC/navBar.inc";
            require "INC/userSideBar.inc"; ?>
            <div class="col-sm-7 centerbar">
                <div class="title">
                    <h2 class="center fonteBranca">Minhas mesas:</h2>
                </div> <?php //Imprindo as mesas do usuario
                $todasAsMesas = pegaJson("DB/dbMesas.json");
                foreach ($_SESSION["user"]->mesas as $codMesa){
                    $mesinha = pegaPorId($todasAsMesas, $codMesa); ?>
                    <h3><?=$mesinha->nome?></h3>
                    <p><strong>Endereço: </strong><?=$mesinha->endereco?></p>
                    <p><strong>Sinopse: </strong><?=$mesinha->sinopse?></p>
                    <form method="post" action="pgMesa.php">
                        <input type="hidden" name="idMesa" value="<?= $mesinha->id ?>">
                        <button type="submit">Detalhes</button>
                    </form> <?php
                }
            ?>
            </div>
            <?php require "INC/notificacoes.inc"; ?>
        </div>
        <div class="footer">
            <?php include "INC/footer.inc"; ?>
        <div>
    </body>
</html>