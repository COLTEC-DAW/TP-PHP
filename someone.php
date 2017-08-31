<?php session_start();
require "INC/funcoes.inc";
userRefresh();
$cara = pegaPorId(pegaJson("DB/dbUsuarios.json"), $_GET["idCara"]); ?>
<!-- Página do perfil do alguém. Mostra o nome, mesas, avaliação e tags -->
<!DOCTYPE>
<html>
    <head>
        <title>Um Perfil</title>
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
            <div class="col-sm-10 centerbar">
                <div class="title">
                    <h2 class="center fonteBranca">Mesas de <?= $cara->nome ?>:</h2>
                </div> <?php //Imprindo as mesas do usuario
                $todasAsMesas = pegaJson("DB/dbMesas.json");
                foreach ($cara->mesas as $codMesa){
                    $mesinha = pegaPorId($todasAsMesas, $codMesa); ?>
                    <div class="divisores">
                        <h3><?=$mesinha->nome?></h3>
                        <p><strong>Endereço: </strong><?=$mesinha->endereco?></p>
                        <p><strong>Sinopse: </strong><?=$mesinha->sinopse?></p>
                        <form method="post" action="pgMesa.php">
                            <input type="hidden" name="idMesa" value="<?= $mesinha->id ?>">
                            <button type="submit" class="btn btn-default">Detalhes</button>
                        </form>
                    </div>
                    <?php
                } ?>
            </div>
        </div>
        <div class="footer">
            <?php include "INC/footer.inc"; ?>
        <div>
    </body>
</html>