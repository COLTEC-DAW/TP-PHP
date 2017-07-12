<?php
    require "class_user.inc";
    require "functions.php";
    Starts();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
  	<!--Import Google Icon Font-->
  	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  	<!--Import materialize.css-->
  	<link type="text/css" rel="stylesheet" href="css/materialize.css"  media="screen,projection"/>
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.css">

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <script type="text/javascript" src="jquery/jquery-3.2.1.js"></script>
    <script type="text/javascript" src="js/materialize.js"></script>
    <nav class="nav-extended">
        <div class="container">


            <?php
                if(IsLogado()){
                    $usuario = $_SESSION["user"];
                ?>
                <div class="nav-wrapper">
                    <a class="brand-logo" href="index.php">TratoFeito</a>
        
                    <ul class="right hide-on-med-and-down">
                        <li><a><i class="fa fa-user" aria-hidden="true"></i> <?=$usuario->nome?></a></li>
                        <li><a href="carteira.php"><i class="fa fa-money" aria-hidden="true"></i> R$:<?=$usuario->carteira?></a></li>
                        <li><a href="deslogar.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Sair</a></li>
                    </ul>

                </div>

                <div class="nav-content">

                    <ul class="tabs tabs-transparent">
                        <li><a href="pedido.php">Fazer Pedido</a></li>
                        <li><a href="historico_doacao.php">Histórico de Doações</a></li>
                    </ul>

                </div>

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
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-12 jumbotron">
                    <h1 class="titulo">Proposta de doação</h1>
                </div>

                <div class="col-md-12">
                    <form action="armazena_pedido.php" method="post">

                        <div class="input-field inline">
                        <input type="text"name="finalidade" required>
                        <label>Finalidade do pedido:</label>                        
                        </div>

                        <div class="input-field">
                        <input type="number" name="meta" required>
                        <label>Meta:</label>                        
                        </div>

                        <div class="input-field">
                        <input type="date" class="datepicker" name="data" required>
                        <label>Data de encerramento:</label>                                                
                        </div>

                        <div class="input-field">
                        <textarea name="descricao" class="materialize-textarea"></textarea>
                        <label for="descricao">Descrição:</label>                        
                        </div>

                        <input type="submit" name="Mandar" class="btn btn-default">
                    </form>
                </div>
            </div>
        </div>
        
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