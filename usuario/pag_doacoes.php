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
    <nav class="navbar">
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
        <div class="card z-depth-3">
            <h1 class="center-align"><?=$doacao_atual->descricao?></h1>
            <p><b>Autor:</b> <?=$doacao_atual->autor?></p>
            <p><b>Sobre:</b></p>
            <div class="col-sm-12">
                <p><?=$doacao_atual->sobre?></p>
            </div>
            <p><b>Meta:</b> <?=$doacao_atual->meta?></p>
            <?php
            $ano = $doacao_atual->data[0].$doacao_atual->data[1].$doacao_atual->data[2].$doacao_atual->data[3];
            $mes = $doacao_atual->data[5].$doacao_atual->data[6];
            $dia = $doacao_atual->data[8].$doacao_atual->data[9];
            ?>
            <p><b>Data Limite:</b> <?=$dia?>/<?=$mes?>/<?=$ano?></p>

            <?php
            if(Eh_Admin()){
            ?>
                <p><ins>Esperando Aprovação</ins></p>
            <?php
            }
            else{
            ?>
                <p><b>Arrecadado:</b> <?=$doacao_atual->valor_acumulado?></p>
            <?php
            }
            ?>
        </div>
    </div>
</body>
<?php include '../footer.inc' ?>
</html>