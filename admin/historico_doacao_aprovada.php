<?php
    ob_start(); // Initiate the output buffer
    require "../usuario/class_user.inc";
    require '../doacoes/class_doacao.inc';
    require 'class_dados_admin.inc';
    require '../utils/functions.php';
    session_start();

    recebe_armazena_acoes();

    $dados = $_SESSION['dados_admin'];
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Trato Feito</title>
        <meta charset="utf-8">
      	
        <!--Import Google Icon Font-->
      	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      	<!--Import materialize.css-->
      	<link type="text/css" rel="stylesheet" href="../css/materialize.css"  media="screen,projection"/>
        <link rel="stylesheet" href="../fonts/font-awesome-4.7.0/css/font-awesome.css">
        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        
        <link rel="stylesheet" type="text/css" href="../css/style.css">
    </head>
<body>
<main>
    <script type="text/javascript" src="../js/jquery/jquery-3.2.1.js"></script>
    <script type="text/javascript" src="../js/materialize.js"></script>

    <?php include '../utils/nav.inc';?>

    <div class="container">
        <div class="row">
            <div class="col s12">
                <div class="col s12">
                    <h1>Propostas Aprovadas:</h1>
                    <?php
                    if(isset($_SESSION['dados_admin'])){
                        $dados1 = $dados->doacoes_aprovadas;
                        if (!empty($dados1)) {
                            foreach($dados1 as $aux){
                            ?>
                                <div class="col s6 conteudo">
                                    <h3 class="conteudo"><?=$aux['finalidade']?></h3>
                                    <h5 class="conteudo">Autor: <?=$aux['autor']?></h5>
                                    <h5 class="conteudo">ID: <?=$aux['id']?></h5>
                                </div>
                            <?php
                            }
                        }
                    }
                    ?>
                </div>
                <div class="col-md-12">
                    <h1>Propostas Recusadas:</h1>
                    <?php
                    if(isset($_SESSION['dados_admin'])){
                        $dados2 = $dados->doacoes_recusadas;
                        if (!empty($dados2)) {
                            foreach($dados2 as $aux){
                            ?>
                                <div class="col s6 conteudo">
                                    <h3 class="conteudo"><?=$aux['finalidade']?></h3>
                                    <h5 class="conteudo">Autor: <?=$aux['autor']?></h5>
                                    <h5 class="conteudo">ID: <?=$aux['id']?></h5>
                                </div>
                            <?php
                            }
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</main>    
</body>
<?php include '../utils/footer.inc' ?>
</html>