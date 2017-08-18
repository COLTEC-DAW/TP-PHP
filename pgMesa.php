<?php //Página para exibir qualquer mesa (o ID da mesa a ser mostrada deve vir via post)
session_start();
require "INC/funcoes.inc";
$idMesa = intval($_POST["idMesa"]);
$entrada = $_POST["entra"];
$saida = $_POST["sai"];
$todasAsMesas = pegaJson("DB/dbMesas.json");
$mesa = pegaPorId($todasAsMesas, $idMesa);
$convidado = $_POST["convite"] || $presente; //Nego pode ver mesa privada se já estiver nela ou usar link com convite
$mesa = pegaPorId(pegaJson("DB/dbMesas.json"), $idMesa);
?>
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
                poeNaMesa($idMesa, $_SESSION["user"]->id);
            }
            elseif ($saida){
                saiDaMesa($idMesa, $_SESSION["user"]->id);
                header("location: home.php");
            }
            $presente = isCaraNaMesa($idMesa, $_SESSION["user"]->id);
            if (!$convidado && !$mesa->public){ //Nego tentando visualizar mesa privada sem convite
                ?> <h2>YOU SHALL NOT PASS</h2> 
                <h3>Esta é uma mesa privada.</h3> <?php
            }
            else { ?>
                <h1><?=$mesa->nome?></h1>
                <div class="divider"></div>
                <p><strong>Mestre: </strong><?= $mesa->mestre ?></p>
                <p><strong>Sistema: </strong><?= $mesa->sistema ?></p>
                <p><strong>Gênero: </strong><?= $mesa->genero ?></p>
                <p><strong>Sinopse: </strong><?= $mesa->sinopse ?></p>
                <p><strong>Endereço: </strong><?= $mesa->endereco ?></p>
                <p><strong>Jogadores:</strong></p> <?php  
                listaJogadores($idMesa);
                if (!$presente) { //Nego ainda não está na mesa ?>
                    <form method="post" action="pgMesa.php">
                        <input type="hidden" name="idMesa" value="<?= $idMesa ?>">
                        <input type="hidden" name="entra" value="1">
                        <button type="submit">Entrar nessa mesa</button>
                    </form> <?php
                }
                else { //Nego já está nessa mesa ?>
                    <form method="post" action="pgMesa.php">
                        <input type="hidden" name="idMesa" value="<?= $idMesa ?>">
                        <input type="hidden" name="sai" value="1">
                        <button type="submit">Sair dessa mesa</button>
                    </form> <?php
                }
            } ?>
            </div>
        </div>
    </body>
    <?php include "INC/footer.inc"; ?>
</html>