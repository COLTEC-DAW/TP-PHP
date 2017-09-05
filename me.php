<?php ob_start();
session_start();
require "INC/funcoes.inc";
userRefresh(); 
if ($_POST["limpa"]){
    $todosUsuarios = pegaJson("DB/dbUsuarios.json");
    $user = pegaPorId($todosUsuarios, $_SESSION["user"]->id);
    $user->notificacoes = [];
    $db = fopen("DB/dbUsuarios.json", 'w');
    fwrite($db, json_encode($todosUsuarios, JSON_PRETTY_PRINT));
    fclose($db);
    userRefresh();
}?>
<!-- Página do perfil do usuário. Mostra o nome, mesas, avaliação e tags -->
<!DOCTYPE>
<html>
    <head>
        <title>Meu Perfil</title>
        <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="STYLE/style.css"></link>
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
        <meta charset=utf-8>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div class="container-fluid"> <?php
            require "INC/navBar.inc";
            require "INC/userSideBar.inc"; ?>
            <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7 centerbar">
                <div class=divisores>
                    <h1><?= $_SESSION["user"]->nome ?><h1>
                    <h4><?= $_SESSION["user"]->email?></h4>
                    <div class="divider"></div>
                    <h2>Minhas mesas:</h2>
                    <?php //Imprindo as mesas do usuario
                        $todasAsMesas = pegaJson("DB/dbMesas.json");
                        foreach ($_SESSION["user"]->mesas as $codMesa){
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
                        }
                    ?>
                </div>
            </div>
            <div class="centerbar col-xs-12 col-sm-12 col-md-3 col-lg-3">
                <div class="divisores">
                    <h2>Suas notificações:</h2> 
                    <form method="post" action="me.php">
                        <input type="hidden" name="limpa" value="true">
                        <button type="submit" class="btn btnCriarMesa">LIMPAR</button>
                    </form><?php
                    foreach ($_SESSION["user"]->notificacoes as $notificacao){
                        if ($notificacao->tipo == 1){ ?>
                            <ul>
                                O mestre <a href="someone.php?idCara=<?=$notificacao->IdRemetente?>"><?= $notificacao->NomeRemetente ?></a> convidou você para a mesa <?= $notificacao->NomeMesa ?>
                            </ul>
                            <form method="post" action="pgMesa.php">
                                <input type="hidden" name="idMesa" value="<?= $notificacao->IdMesa ?>">
                                <input type="hidden" name="convite" value="true">
                                <button type="submit" class="btn btn-default">Ver mesa</button>
                            </form> <?php
                        }
                        else if ($notificacao->tipo == 2){ ?>
                            <ul>
                                Houve uma modificação na mesa <?= $notificacao->NomeMesa ?> do mestre <a href="someone.php?idCara=<?=$notificacao->IdRemetente?>"><?= $notificacao->NomeRemetente ?></a>
                            </ul>
                            <form method="post" action="pgMesa.php">
                                <input type="hidden" name="idMesa" value="<?= $notificacao->IdMesa ?>">
                                <input type="hidden" name="convite" value="true">
                                <button type="submit" class="btn btn-default">Ver mesa</button>
                            </form> <?php
                        }
                        else if ($notificacao->tipo == 3){ ?>
                            <ul>
                                A mesa <?= $notificacao->NomeMesa ?> do mestre <a href="someone.php?idCara=<?=$notificacao->IdRemetente?>"><?= $notificacao->NomeRemetente ?></a> foi deletada :(
                            </ul> <?php
                        } 
                    } ?>
                </div>
            </div>
        </div>
        <div class="footer">
            <?php include "INC/footer.inc"; ?>
        <div>
    </body>
</html>