<?php
ob_start();
session_start();
require "INC/funcoes.inc";
userRefresh(); ?>
<!-- Página principal. Mostra o usuário logado, as notificaçÕes dele, sua mesas, a busca de mesas e a opção de criar mesas -->
<!DOCTYPE>
<html>
    <head>
        <title>GameMaster</title>
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
        <div class="container-fluid"> 
            <?php
                require "INC/navBar.inc";
                require "INC/userSideBar.inc";
            ?>
            <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 centerbar">
                <form method="get" action="novaMesa.php">
                    <button type="submit" class="btn btn-primary btnCriarMesa">Criar mesa</button>
                </form>
                <div class="title">
                    <h2 class="center fonteBranca">Mesas na área:</h2>
                </div>
                <?php listaTodasMesas();?>
            </div>
        </div>
        <div class="footer">
            <?php include "INC/footer.inc"; ?>
        <div>
    </body>
</html>