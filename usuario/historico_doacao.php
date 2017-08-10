<?php
    ob_start(); // Initiate the output buffer
    require "class_user.inc";
    require "../utils/functions.php";
    require '../doacoes/class_doacao.inc';
    require '../doacoes/class_utils.inc';
    session_start();
    //pega todos os dados, coloca na classe, e coloca a classe na seção.
    armazena_dados_secao();

    $dados = $_SESSION['utils'];
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

    <?php include '../utils/nav.inc' ?>

    <div class="container">
        <div class="row">
            <div class="col s12">
                <div class="col s12">
                    <h1>Propostas abertas:</h1>
                    <?php
//printar todas as doações abertas pelo usuário que esta logado.
//usar classes.
//dados do arquivo doacoes.
//olhar pela variavel autor.
                    if(isset($_SESSION['utils'])){
                        $dados1 = $dados->doacoes_abertas;
                        if (!empty($dados1)) {
                            foreach($dados1 as $aux){
                                $temp;
                                if($aux['aprovado']==0){
                                    $temp = "Esperando Aprovação.";
                                }
                                else{
                                    $temp = "Aprovado.";
                                }

                            ?>
                                <div class="col s6 conteudo">
                                    <h3 class="conteudo"><?=$aux['finalidade']?></h3>
                                    <h5 class="conteudo">Meta: <?=$aux['meta']?></h5>
                                    <h5 class="conteudo">Arrecadado: <?=$aux['arrecadado']?></h5>
                                    <h5 class="conteudo">Status: <?=$temp?></h5>
                                </div>
                            <?php
                            }
                        }
                    }
                    ?>
                </div>
                <div class="col s12">
                    <h1>Contribuições Realizadas:</h1>
                    <?php
//printar todas as doações feitas pelo usuário que esta logado.
//usar classes.
//dados do arquivo movimento_Capital.
//varivel fez_doacao.
                    if(isset($_SESSION['utils'])){
                        $dados2 = $dados->doacoes_realizadas;
                        if (!empty($dados2)) {
                            foreach($dados2 as $aux){
                            ?>
                                <div class="col s6 conteudo">
                                    <h5 class="conteudo">Doou: <?=$aux['valor_doado']?></h5>
                                    <h5 class="conteudo">Para: <?=$aux['recebeu_doacao']?></h5>
                                </div>
                            <?php
                            }
                        }
                    }
                    ?>
                </div>
                <div class="col s12">
                    <h1>Contribuições Recebidas:</h1>
                    <?php
//printar todas as doações recebidas pelo usuário que esta logado.
//usar classes.
//dados do arquivo movimento_Capital.
//varivel recebeu_doacao.
                    if(isset($_SESSION['utils'])){                    
                        $dados3 = $dados->doacoes_recebidas;
                        if (!empty($dados3)) {
                            foreach($dados3 as $aux){
                            ?>
                                <div class="col s6 conteudo">
                                    <h5 class="conteudo">Recebeu: <?=$aux['valor_doado']?></h5>
                                    <h5 class="conteudo">De: <?=$aux['fez_doacao']?></h5>
                                </div>
                            <?php
                            }
                        }
                    }
                    ?>
                </div>
                <div class="col s12">
                    <h1>Propostas Completas:</h1>
                    <?php
//printar todas as doações completadas do usuário que esta logado.
//usar classes.
//dados do arquivo doacoes_finalizadas.
//varivel autor.
                    if(isset($_SESSION['utils'])){
                        $dados4 = $dados->doacoes_completadas;
                        if (!empty($dados4)) {
                            foreach($dados4 as $aux){
                            ?>
                                <div class="col s6 conteudo">
                                    <h5 class="conteudo">Finalidade: <?=$aux['finalidade']?></h5>
                                    <?php
                                    if($aux['meta']==$aux['arrecadado']){
                                    ?>
                                    <h5 class="conteudo">Meta atingida.</h5>
                                    <?php
                                    }
                                    else{
                                    ?>
                                    <h5 class="conteudo">Data limite alcançada.</h5>
                                    <?php
                                    }
                                    ?>
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