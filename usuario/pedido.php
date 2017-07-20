<?php
    ob_start(); // Initiate the output buffer
    require "class_user.inc";
    require '../doacoes/class_doacao.inc';
    require '../doacoes/verifica_data.php';
    require '../utils/functions.php';
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
    <nav>
        <div class="container">
            <?php
                if(IsLogado("../usuario/users.json")){
                    $usuario = $_SESSION["user"];
                ?>       
                    <ul class="left hide-on-med-and-down">
                    <a class="brand-logo" href="../index.php">TratoFeito</a>
                        
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
                else{
                    $redirect = "../index.php";
                    header("location:$redirect");
                }
            ?>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                    <h1 class="titulo">Proposta de doação</h1>

                <div class="col-md-12">
                    <form action="../doacoes/armazena_pedido.php" method="post" enctype="multipart/form-data">

                        <div class="input-field">
                        <input type="text"name="finalidade" required>
                        <label>Finalidade</label>                        
                        </div>

                        <div class="input-field">
                        <input type="number" name="meta" required>
                        <label>Meta</label>                        
                        </div>

                        <div class="input-field">
                        <input type="date" class="datepicker" name="data" required>
                        </div>
                        <label id="label">*Data de encerramento</label>                                                

                        <div class="input-field">
                        <textarea name="descricao" class="materialize-textarea"></textarea>
                        <label for="descricao">Descrição</label>                        
                        </div>

                        <div class="file-field input-field">
                            <div class="btn">
                                <span>File</span>
                                <input type="file" name="fileToUpload" id="fileToUpload" required>
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text">
                            </div>
                        </div>

                        <div class=" center-align">
                            <input type="submit" name="Mandar" class="btn btn-default">
                        </div>
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