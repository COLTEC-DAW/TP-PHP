<?php //Página para exibir qualquer mesa (o ID da mesa a ser mostrada deve vir via post)
session_start();
require "classes.php";
//require "INC/funcoes.inc";
$idMesa =  $_POST["idMesa"];
$convidado = $_POST["convite"];
$entrada = $_POST["entra"];
$todasAsMesas = pegaJson("DB/dbMesas.json");
$mesa = pegaPorId($todasAsMesas, $idMesa); ?>

<!DOCTYPE>
<html>
    <head>
        <title><?=$mesa->nome?></title>
        <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="STYLE/style.css"></link>
    </head>
    <body> 
        <div class="container-fluid">
            <? require "INC/userSideBar.inc"; ?>
            <div class="col-sm-10 centerbar">
        <?php
            if ($entrada) {
                if (!($mesa->public)&&!$convidado){
                    ?> <h1>YOU SHALL NOT PASS!!!</h1>
                    <h2>Parece que você não tem acesso a essa mesa...</h2> <?php
                }
                else {
                    //echo $mesa->{'public'}." /".$convidado;
                }
            }
            else{
                if (!($mesa->public)&&!$convidado){
                    ?> <h2>Esta é uma mesa privada.</h2> <?php
                }
                else { ?>
                            <h1><?=$mesa->nome?></h1>
                            <div class="divider"></div>
                            <p><strong>Mestre: </strong><?= $mesa->mestre ?></p>
                            <p><strong>Sistema: </strong><?= $mesa->sistema ?></p>
                            <p><strong>Gênero: </strong><?= $mesa->genero ?></p>
                            <p><?= $mesa->sinopse ?></p>
                            <p><strong>Endereço: </strong><?= $mesa->endereco ?></p>
                    <?php   /* Comentando por não estar sendo usado agora
                            *listaJogadores();
                            */
                }
            }
    ?>
            </div>
        </div>
        <? include "INC/footer.inc"; ?>
</body>
</html>