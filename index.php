<?php
ob_start();
session_start();
require "INC/funcoes.inc";?>
<!-- Página principal. Mostra o usuário logado, as notificaçÕes dele, sua mesas, a busca de mesas e a opção de criar mesas -->

<!-- SÓ FUNCIONA COM O FAKER NA PASTA ESPECIFICADA -->
<!-- Precisamos melhorar *demais* o CSS -->
<!DOCTYPE>
<html>
    <head>
        <title>GameMaster</title>
        <link rel="stylesheet" type="text/css" href="STYLE/style.css"></link>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <meta charset=utf-8>
    </head>
    <body>
        <div class="container-fluid">
            <? require "INC/userSideBar.inc"; ?>
            <div class="col-sm-7 centerbar">
                <form method="get" action="novaMesa.php">
                    <button type="submit" class="btn btn-primary btnCriarMesa">Criar mesa</button>
                </form>
                <div class="title">
                    <h2 class="center fonteBranca">Mesas na área:</h2>
                </div>
                <?php $todasAsMesas = listaMesas(); 
                foreach ($todasAsMesas as $mesinha) {
                    ?>
                    <h3><?=$mesinha->nome?></h3>
                    <p><strong>Endereço: </strong><?=$mesinha->endereco?></p>
                    <p><?=$mesinha->sinopse?></p>
                    <form method="post" action="pgMesa.php">
                        <input type="hidden" name="entra" value="<?= false ?>">
                        <input type="hidden" name="idMesa" value="<?= $mesinha->id ?>">
                        <input type="hidden" name="convite" value="<?= false ?>">
                        <button type="submit">Detalhes</button>
                    </form> <?php
                }?>
            </div>
            <div class="sidebar col-sm-3">
                <!--<div class="title">-->
                <h2>Suas notificações:</h2>
                <ul>
                    <li>Horário de <a href="pgMesa.php">Mesa 1</a> foi alterado</li>
                    <li>Jogador _D4rk_S0rc3r3r_ saiu da <a href="pgMesa.php">Mesa 3</a></li>
                    <li>O mestre Krysvera te convidou para a <a href="pgMesa.php">Mesa 4</a></li>
                </ul>
                <!--</div>-->
            </div>
        </div>
        <div class="footer">
            <?php include "INC/footer.inc"; ?>
        <div>
    </body>
</html>