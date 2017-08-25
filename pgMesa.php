<?php //Página para exibir qualquer mesa (o ID da mesa a ser mostrada deve vir via post)
session_start();
require "INC/funcoes.inc";
userRefresh();
$idMesa = intval($_POST["idMesa"]);
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
            if ($_POST["entra"])
                poeNaMesa($idMesa, $_SESSION["user"]->id);
                //Seria bom por um header aqui para recarregar
            elseif ($_POST["sai"]){
                saiDaMesa($idMesa, $_SESSION["user"]->id);
            }
            if ($_POST["kicka"])
                bane($idMesa, $_POST["kickado"]);
                //Seria bom por um header aqui para recarregar

            $presente = isCaraNaMesa($idMesa, $_SESSION["user"]->id);
            $convidado = ($_POST["convite"] || $presente); //Nego pode ver mesa privada se já estiver nela ou usar link com convite

            //AQUI COMEÇA A VISUALIZACAO DA PÁGINA
            $mesa = pegaPorId(pegaJson("DB/dbMesas.json"), $idMesa);
            $mestre = ($_SESSION["user"]->nome == $mesa->mestre); //Nomes iguais devem bugar o sistema. Corrijo depois ?>
            
            <nav class="navbar navbar-default navbar-static-top withoutBottomMargin withoutBorder">
                <div class="container-reserva sideBar">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="GameMasterFont fontePreta navbar-brand" href="#">GameMaster</a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav navbar-right">
                            <li><a class="fontePreta" href="#">Home</a></li>
                            <li><a class="fontePreta" href="me.php">Perfil</a></li>
                            <li><a class="fontePreta" href="logout.php">Sair</a></li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav> <?php

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
                    $todosUsuarios = pegaJson("DB/dbUsuarios.json");
                    foreach ($mesa->jogadores as $jogador) {
                        $caraDaVez = pegaPorId($todosUsuarios, $jogador); ?>
                        <li>
                            <p><?= $caraDaVez->nome ?></p> <?php
                            if ($mestre){ ?>
                                <form method="post" action="pgMesa.php">
                                    <input type="hidden" name="idMesa" value="<?= $idMesa ?>">
                                    <input type="hidden" name="kicka" value="true">
                                    <input type="hidden" name="kickado" value="<?= $caraDaVez->id?>">
                                    <button type="submit">Banir</button>
                                </form> <?php
                            } ?>
                        </li> <?php
                    }?>
                </ul> <?php

                if (!$presente) { //Nego ainda não está na mesa ?>
                    <form method="post" action="pgMesa.php">
                        <input type="hidden" name="idMesa" value="<?= $idMesa ?>">
                        <input type="hidden" name="entra" value="1">
                        <button type="submit">Entrar nessa mesa</button>
                    </form> <?php
                }
                else { //Nego já está nessa mesa 
                    if ($mestre){ ?>
                    <form method="post" action="pgMesa.php">
                        <input type="hidden" name="idMesa" value="<?= $idMesa ?>">
                        <input type="text" name="nomeConvidado" value="">
                        <button type="submit">Convide alguém</button>
                    </form>
                    <br> <?php
                    } ?>
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