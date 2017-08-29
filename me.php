<!-- Página do perfil do usuário. Mostra o nome, mesas, avaliação e tags -->
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
            <div class="centerbar col-sm-12 col-md-3 col-lg-3">
                <div class="divisores">
                    <h2>Suas notificações:</h2> 
                    <form method="post" action="me.php">
                        <input type="hidden" name="limpa" value="true">
                        <button type="submit">LIMPAR</button>
                    </form><?php
                    foreach ($_SESSION["user"]->notificacoes as $notificacao){
                        if ($notificacao->tipo == 1){ ?>
                            <ul>
                                O mestre <a href="someone.php?idCara=<?=$notificacao->IdRemetente?>"><?= $notificacao->NomeRemetente ?></a> convidou você para a mesa <?= $notificacao->NomeMesa ?>
                            </ul> <?php
                        }
                        else { ?>
                            <ul>
                                Houve uma modificação na mesa <?= $notificacao->NomeMesa ?> do mestre <a href="someone.php?idCara=<?=$notificacao->IdRemetente?>"><?= $notificacao->NomeRemetente ?></a>
                            </ul> <?php
                        } ?>
                        <form method="post" action="pgMesa.php">
                            <input type="hidden" name="idMesa" value="<?= $notificacao->IdMesa ?>">
                            <input type="hidden" name="convite" value="true">
                            <button type="submit">Ver mesa</button>
                        </form> <?php
                    } ?>
                </div>
            </div>
        </div>
        <div class="footer">
            <?php include "INC/footer.inc"; ?>
        <div>
    </body>
</html>