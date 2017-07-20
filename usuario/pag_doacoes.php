<?php
    ob_start(); // Initiate the output buffer
    require "class_user.inc";
    require "../utils/functions.php";
    require '../doacoes/class_doacao.inc';
    session_start();

    $id = $_POST['id'];
    armazena_doacoes_classe($id);

    $doacao_atual = $_SESSION["doacao_atual"];
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css?version=1">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="../index.php">TratoFeito</a>
            </div>
            <?php
                if(IsLogado("users.json")){
                    $usuario = $_SESSION['user'];
                ?>
                    <ul class="nav navbar-nav">
                        <li><a href="pedido.php">Fazer Pedido</a></li>
                        <li><a href="historico_doacao.php">Histórico de Doações</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a><span class="glyphicon glyphicon-user"></span> Bem vindo: <?=$usuario->nome?></a></li>
                        <li><a href="carteira.php"><span class="glyphicon glyphicon-log-in"></span> Carteira R$: <?=$usuario->carteira?></a></li>
                        <li><a href="deslogar.php"><span class="glyphicon glyphicon-log-in"></span> Sair</a></li>
                    </ul>
                <?php
                }
                else if(Eh_Admin()){
                ?>
                    <ul class="nav navbar-nav">
                        <li><a href="admin/historico_doacao_aprovada.php">Histórico de Doações Aprovadas</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="deslogar.php"><span class="glyphicon glyphicon-log-in"></span> Sair</a></li>
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
      
    <div class="container">
        <h1><?=$doacao_atual->descricao?></h1>
        <h2>Autor: <?=$doacao_atual->autor?></h2>
        <h3>Sobre:</h3>
        <div class="col-sm-12">
            <p><?=$doacao_atual->sobre?></p>
        </div>
        <h2>Meta: <?=$doacao_atual->meta?></h2>
        <?php
        if(Eh_Admin()){
        ?>
            <h2>Esperando Aprovação</h2>
        <?php
        }
        else{
        ?>
            <h2>Arrecadado: <?=$doacao_atual->valor_acumulado?></h2>
        <?php
        }
        $ano = $doacao_atual->data[0].$doacao_atual->data[1].$doacao_atual->data[2].$doacao_atual->data[3];
        $mes = $doacao_atual->data[5].$doacao_atual->data[6];
        $dia = $doacao_atual->data[8].$doacao_atual->data[9];
        ?>
        <h2>Data Limite: <?=$dia?>/<?=$mes?>/<?=$ano?></h2>
    </div>
</body>
</html>