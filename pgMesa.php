<?php //Página para exibir qualquer mesa (o ID da mesa a ser mostrada deve vir via post)
session_start();
require "classes.php";
userRefresh();
$idMesa = intval($_POST["idMesa"]);
$todasAsMesas = pegaJson("DB/dbMesas.json");
$todosUsuarios = pegaJson("DB/dbUsuarios.json");
$mesa = pegaPorId($todasAsMesas, $idMesa);

if ($_POST["destroy"]){
    foreach ($mesa->jogadores as $jogador) {
        $caraDaVez = pegaPorId($todosUsuarios, $jogador);
        if ($jogador != $_SESSION["user"]->id)
            New Notificacao(3, $caraDaVez->nome, $idMesa);
        bane($idMesa, $caraDaVez);
    }
    $NovasMesas = [];
    foreach ($todasAsMesas as $mesinha)
        if ($mesinha->id != $idMesa)
            array_push($NovasMesas, $mesinha);
    $db = fopen("DB/dbMesas.json", 'w');
    fwrite($db, json_encode($NovasMesas, JSON_PRETTY_PRINT));
    fclose($db);
    header("location: home.php");
}
?>
<!DOCTYPE>
<html>
    <head>
        <title><?=$mesa->nome?></title>
        <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
        <meta http-equiv="Content-Type" content="text/html" charset="utf-8">        
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
        <link rel="stylesheet" type="text/css" href="STYLE/style.css"></link>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head> <?php
    if ($_POST["entra"]){
        foreach ($mesa->jogadores as $jogador) {
            $caraDaVez = pegaPorId($todosUsuarios, $jogador);
            New Notificacao(2, $caraDaVez->nome, $idMesa);
        }
        poeNaMesa($idMesa, $_SESSION["user"]->id);
    }
    elseif ($_POST["sai"]){
        saiDaMesa($idMesa, $_SESSION["user"]->id);
        foreach ($mesa->jogadores as $jogador) {
            $caraDaVez = pegaPorId($todosUsuarios, $jogador);
            New Notificacao(2, $caraDaVez->nome, $idMesa);
        }
    }
    if ($_POST["kicka"]){
        bane($idMesa, $_POST["kickado"]);
        foreach ($mesa->jogadores as $jogador) {
            $caraDaVez = pegaPorId($todosUsuarios, $jogador);
            New Notificacao(2, $caraDaVez->nome, $idMesa);
        }
    }
    if ($_POST["convidando"])
        New Notificacao(1, $_POST["nomeConvidado"], $idMesa);
    
    if ($_POST["sessaoFeita"]){ ?>
        <div class="alert alert-success alert-dismissable">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Sessão feita</strong>
        </div> <?php
        foreach ($mesa->jogadores as $jogador) {
            $caraDaVez = pegaPorId($todosUsuarios, $jogador);
            New Notificacao(5, $caraDaVez->nome, $idMesa);
        }
    }

    $presente = isCaraNaMesa($idMesa, $_SESSION["user"]->id);
    $convidado = ($_POST["convite"] || $presente); //Nego pode ver mesa privada se já estiver nela ou usar link com convite

    //AQUI COMEÇA A VISUALIZACAO DA PÁGINA
    $mesa = pegaPorId(pegaJson("DB/dbMesas.json"), $idMesa);
    $mestre = ($_SESSION["user"]->nome == $mesa->mestre); //Nomes iguais devem bugar o sistema. Corrijo depois ?>
    <body>
        <div class="container-fluid">
            <?php
                require "INC/navBar.inc";
                require "INC/userSideBar.inc";
            ?>
            <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 centerbar">
                <div class="divisores"> <?php

                    if ((!$convidado && !$mesa->public) || taNoArray($_SESSION["user"]->id, $mesa->banidos)){ //Nego tentando visualizar mesa privada sem convite
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
                        <p><strong>Jogadores:</strong></p>
                        <ul> <?php //Listando os jogadores
                            foreach ($mesa->jogadores as $jogador) {
                                $caraDaVez = pegaPorId($todosUsuarios, $jogador); ?>
                                <li>
                                    <a href="someone.php?idCara=<?=$jogador?>"><?= $caraDaVez->nome ?></a> <?php
                                    if ($mestre && $jogador != $_SESSION["user"]->id){ ?>
                                        <form method="post" action="pgMesa.php">
                                            <input type="hidden" name="idMesa" value="<?= $idMesa ?>">
                                            <input type="hidden" name="kicka" value="true">
                                            <input type="hidden" name="kickado" value="<?= $caraDaVez->id?>">
                                            <button type="submit" class="btn btn-default">Banir</button>
                                        </form> <?php
                                    } ?>
                                </li> <?php
                            }?>
                        </ul> <?php
                        if ($mestre){ ?>
                            <form method="post" action="pgMesa.php"> <!-- Form pra convidar -->
                                <input type="hidden" name="idMesa" value="<?= $idMesa ?>">
                                <input type="hidden" name="convidando" value="true">
                                <div class="form-group">
                                    <label class="sr-only" for="nomeConvidado">Login</label>
                                    <input type="text" class="form-control col-3" id="nomeConvidado" placeholder="Nome" name="nomeConvidado">
                                </div>
                                <button type="submit" class="btn btn-default">Convide alguém</button>
                            </form>
                            <br>
                            <form method="post" action="pgMesa.php"> <!-- Botão de sessão -->
                                <input type="hidden" name="idMesa" value="<?= $idMesa ?>">
                                <input type="hidden" name="sessaoFeita" value="true">
                                <button type="submit" class="btn btn-success">Ter uma sessão</button>
                            </form>
                            <br>
                            <form method="post" action="editaMesa1.php"> <!-- Botão de edição -->
                                <input type="hidden" name="idMesa" value="<?= $idMesa ?>">
                                <button type="submit" class="btn btn-warning">Editar mesa</button>
                            </form>
                            <form method="post" action="pgMesa.php"> <!-- Botão de destruição -->
                                <input type="hidden" name="idMesa" value="<?= $idMesa ?>">
                                <input type="hidden" name="destroy" value="true">
                                <button type="submit" class="btn btn-danger">DESTRUIR MESA</button>
                            </form>
                            <?php
                        }
                        else {
                            if (!$presente) { //Nego ainda não está na mesa ?>
                                <form method="post" action="pgMesa.php">
                                    <input type="hidden" name="idMesa" value="<?= $idMesa ?>">
                                    <input type="hidden" name="entra" value="1">
                                    <button type="submit" class="btn btnCriarMesa fonteBranca">Entrar nessa mesa</button>
                                </form> <?php
                            }
                            else { //Nego já está nessa mesa ?>
                                <form method="post" action="pgMesa.php">
                                    <input type="hidden" name="idMesa" value="<?= $idMesa ?>">
                                    <input type="hidden" name="sai" value="1">
                                    <button type="submit" class="btn btnCriarMesa fonteBranca">Sair dessa mesa</button>
                                </form> <?php
                            }
                        }
                    } ?>
                </div>
            </div>
        </div>
    </body>
    <?php include "INC/footer.inc"; ?>
</html>