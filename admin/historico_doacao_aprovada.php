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
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
</head>
<body>

    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="../index.php">TratoFeito</a>
            </div>

            <?php
                if(Eh_Admin()){
                ?>
                    <ul class="nav navbar-nav">
                        <li><a href="historico_doacao_aprovada.php">Histórico de Doações Aprovadas</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="../usuario/deslogar.php"><span class="glyphicon glyphicon-log-in"></span> Sair</a></li>
                    </ul>
                <?php
                }
                else{
                    $redirect = "../index.php";
                    header("location:$redirect");
                }
            ?>
        </div>
    </nav>


    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-12">
                    <h1>Doações Aprovadas:</h1>
                    <?php
                    if(isset($_SESSION['dados_admin'])){
                        $dados1 = $dados->doacoes_aprovadas;
                        if (!empty($dados1)) {
                            foreach($dados1 as $aux){
                            ?>
                                <div class="col-sm-3 conteudo">
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
                    <h1>Doações Recusadas:</h1>
                    <?php
                    if(isset($_SESSION['dados_admin'])){
                        $dados2 = $dados->doacoes_recusadas;
                        if (!empty($dados2)) {
                            foreach($dados2 as $aux){
                            ?>
                                <div class="col-sm-3 conteudo">
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
</body>
</html>