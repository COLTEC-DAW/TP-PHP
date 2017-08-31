<?php //Página para exibir qualquer mesa (o ID da mesa a ser mostrada deve vir via post)
session_start();
require "classes.php";
userRefresh();
$idMesa = intval($_POST["idMesa"]);
$mesa = pegaPorId(pegaJson("DB/dbMesas.json"), $idMesa);
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
    </head>
    <body>
        <div class="container-fluid">
            <?php
                require "INC/navBar.inc";
                require "INC/userSideBar.inc";
            ?>
            <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 centerbar">
                <div class="divisores">
        <?php
            if ($_POST["entra"]){
                poeNaMesa($idMesa, $_SESSION["user"]->id);
            }
            elseif ($_POST["sai"]){
                saiDaMesa($idMesa, $_SESSION["user"]->id);
            }
            if ($_POST["kicka"]){
                bane($idMesa, $_POST["kickado"]);
            }
            if ($_POST["convidando"])
                New Notificacao(1, $_POST["nomeConvidado"], $idMesa);
            
            $presente = isCaraNaMesa($idMesa, $_SESSION["user"]->id);
            $convidado = ($_POST["convite"] || $presente); //Nego pode ver mesa privada se já estiver nela ou usar link com convite

            //AQUI COMEÇA A VISUALIZACAO DA PÁGINA
            $mesa = pegaPorId(pegaJson("DB/dbMesas.json"), $idMesa);
            $mestre = ($_SESSION["user"]->nome == $mesa->mestre); //Nomes iguais devem bugar o sistema. Corrijo depois

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
                if ($mestre){ ?>
                    <form method="post" action="pgMesa.php">
                        <input type="hidden" name="idMesa" value="<?= $idMesa ?>">
                        <input type="hidden" name="convidando" value="true">
                        <input type="text" id="nomeConvidado" placeholder="Nome" name="nomeConvidado">
                        <button type="submit">Convide alguém</button>
                    </form>
                    <br> <?php
                }

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
        </div>
    </body>
    <?php include "INC/footer.inc"; ?>
</html>