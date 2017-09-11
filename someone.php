<?php session_start();
require "classes.php";
userRefresh();
$idCara = intval($_GET["idCara"]);
if ($idCara == $_SESSION["user"]->id) header("location: me.php");
$todosUsuarios = pegaJson("DB/dbUsuarios.json");
$cara = pegaPorId($todosUsuarios, $idCara);
// Página do perfil do alguém. Mostra o nome, mesas, avaliação e tags
if ($_POST["votando"]){
    foreach ($todosUsuarios as $umCara) {
        if ($idCara == $umCara->id){
            foreach($umCara->tags as $tag){
                if (strcmp($tag->atributo, $_POST["nomeTag"]) == 0){
                    $tag->votos+= intval($_POST["voteTag"]);
                        if ($tag->votos <= 0) {
                            $umCara->tags = tiraDoVetor($umCara->tags, $tag);
                        }
                    break;
                }
            }
            break;
        }
    }
    foreach ($todosUsuarios as $procurandoUser) {
        if ($procurandoUser->id == $_SESSION["user"]->id) {
            $procurandoUser->avaliacoesPendentes = tiraDoVetor($procurandoUser->avaliacoesPendentes, $idCara);
            break;
        }
    }
    $db = fopen("DB/dbUsuarios.json", 'w');
    fwrite($db, json_encode($todosUsuarios, JSON_PRETTY_PRINT));
    fclose($db);
    $cara = pegaPorId($todosUsuarios, $idCara);
}
if ($_POST["novaTag"]){
    foreach ($todosUsuarios as $umCara) {
        if ($idCara == $umCara->id){
            New Tag ($_POST["nomeTag"], $umCara->id);
            break;
        }
    }
    $todosUsuarios = pegaJson("DB/dbUsuarios.json");
    foreach ($todosUsuarios as $procurandoUser) {
        if ($procurandoUser->id == $_SESSION["user"]->id) {
            $procurandoUser->avaliacoesPendentes = tiraDoVetor($procurandoUser->avaliacoesPendentes, $idCara);
            break;
        }
    }
    $db = fopen("DB/dbUsuarios.json", 'w');
    fwrite($db, json_encode($todosUsuarios, JSON_PRETTY_PRINT));
    fclose($db);
} 
userRefresh();
$cara = pegaPorId($todosUsuarios, $idCara);?>
<!DOCTYPE>
<html>
    <head>
        <title>Perfil de <?=$cara->nome?></title>
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
                    <h1><?= $cara->nome ?><h1>
                    <h4><?=$cara->email?></h4>
                    <div class="divider"></div>
                    <h2>Mesas de <?= $cara->nome ?>:</h2>
                    <?php //Imprindo as mesas do usuario
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
            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 centerbar">
                <div class="divisores">
                    <h2>Tags:</h2>
                    <div class="divider"></div> <?php
                    if (!taNoArray($idCara, $_SESSION["user"]->avaliacoesPendentes)){ ?>
                        <ul> <?php
                        foreach ($cara->tags as $tag) ?>
                            <li><strong><?= $tag->atributo ?></strong> (<?= $tag->votos ?> votos)</li>
                        </ul> <?php
                    }
                    else {
                        foreach ($cara->tags as $tag){ ?>
                            <form action="someone.php?idCara=<?= $idCara ?>" method="POST">
                                <input type="hidden" name="votando" value="true">
                                <input type="hidden" name="nomeTag" value="<?= $tag->atributo ?>">
                                <div class="form-group">
                                    <div id="votos">
                                        <label class="radio-inline">
                                            <input type="radio" name="voteTag" id="voteDown" value="-1">Discordo
                                        </label>
                                        <strong><?= $tag->atributo; ?></strong>
                                        <label class="radio-inline">
                                            <input type="radio" name="voteTag" id="voteUp" value="1">Concordo
                                        </label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Votar</button>
                            </form> <?php
                        } ?>
                        <form method="post" action="someone.php?idCara=<?= $idCara ?>">
                            <input type="hidden" name="novaTag" value="true">
                            <div class="form-group">
                                <label class="sr-only" for="nomeConvidado">Tag</label>
                                <input type="text" class="form-control col-3" id="nomeTag" placeholder="Nova Tag" name="nomeTag">
                            </div>
                            <button type="submit" class="btn btn-default">Criar Tag</button>
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