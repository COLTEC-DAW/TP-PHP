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

    <script type="text/javascript" src="../js/jquery/jquery-3.2.1.js"></script>
    <script type="text/javascript" src="../js/materialize.js"></script>
    <nav class="navbar indigo darken-2">
        <div class="container">
            <a class="brand-logo" href="../index.php">TratoFeito</a>
            <?php
                if(IsLogado("../usuario/users.json")){
                    $usuario = $_SESSION["user"];
                ?>       
                    <ul class="left hide-on-med-and-down">
                        <li><a href="pedido.php">Fazer Pedido</a></li>
                        <li><a href="historico_doacao.php">Histórico de Doações</a></li>
                    </ul>

                    <ul class="right hide-on-med-and-down">
                        <li><a><i class="fa fa-user" aria-hidden="true"></i> <?=$usuario->nome?></a></li>
                        <li><a href="carteira.php"><i class="fa fa-money" aria-hidden="true"></i> R$:<?=$usuario->carteira?></a></li>
                        <li><a href="deslogar.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Sair</a></li>
                    </ul>
                    <?php
                }
                else if(Eh_Admin()){
                ?>
                    <ul class="left">
                        <li><a href="../admin/historico_doacao_aprovada.php">Histórico de Doações Aprovadas</a></li>
                    </ul>
                    <ul class="right">
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