<?php //Página para exibir qualquer mesa (o ID da mesa a ser mostrada deve vir via post)
session_start();
require "classes.php";
require "funcoes.php";
$idMesa =  $_POST["idMesa"];
$convidado = $_POST["convite"];
$entrada = $_POST["entra"];

$todasAsMesas = pegaJson("DB/dbMesas.json");
$mesa = pegaPorId($todasAsMesas, $id); ?>

<!DOCTYPE>
<html>
    <head>
        <title><?=$mesa->nome?></title>
        <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
    </head>
    <body> <?php
        if (entrada) {
            if (!($mesa->public)&&!$convidado){
                ?> <h1>YOU SHALL NOT PASS!!!</h1>
                <h2>Parece que você não tem acesso a essa mesa...</h2> <?php
            }
            else {
                
            }
        }
        if (!($mesa->public)&&!$convidado){
            ?> <h2>Esta é uma mesa privada.</h2> <?php
        }
        else { ?>
            <h1><?=$mesa->nome?></h1>
            <p><strong>Mestre: </strong><?= $mesa->mestre ?></p>
            <p><strong>Sistema: </strong><?= $mesa->sistema ?></p>
            <p><strong>Gênero: </strong><?= $mesa->genero ?></p>
            <p><?= $mesa->sinopse ?></p>
            <p><strong>Endereço: </strong><?= $mesa->endereco ?></p>
            <?php listaJogadores();
        }
?>
</body>
</html>
<?php include "INC/footer.inc"; ?>