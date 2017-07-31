<?php
    ob_start(); // Initiate the output buffer
    require "../utils/functions.php";
    require "class_user.inc";
    require '../doacoes/class_doacao.inc';
    session_start();
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
                $permissao = 0;
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
                else{
                    $redirect = "index.php";
                    header("location:$redirect");
                }
                ?>
        </div>
    </nav>
      
    <div class="container">
        <form action="deposita.php" method="post">
            <label>Valor que deseja depositar</label>
            <input type="number" class="form-control" name="valor">
            <input type="submit" class="btn btn-default" name="Verificar" value="Depositar">
        </form>
        <?php
            if(Errors()){
                $resposta = Errors();
                $_SESSION['error'] = "valido";
            ?>
                <div class="card-panel red lighten-4">
                    <span><?=$resposta?></span>
                </div>
            <?php
            }
        ?>
    </div>                 
</body>
</html>