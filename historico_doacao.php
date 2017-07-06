<?php
    ob_start(); // Initiate the output buffer
    require "class_user.inc";
    require 'class_doacao.inc';
    require 'class_utils.inc';
    session_start();
    //pega todos os dados, coloca na classe, e coloca a classe na seção.
    armazena_dados_secao();

    $dados = $_SESSION['utils'];
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
                <a class="navbar-brand" href="index.php">WebSiteName</a>
            </div>

            <?php
                $permissao = 0;
                $eh_admin = 0;
                if(isset($_SESSION["user"])){
                    $usuario = $_SESSION["user"];
                    if($usuario->login!="admin"){
               
                        /*
                                LEITURA
                        */
                        $arquivo = file_get_contents('users.json');
                        $json = json_decode($arquivo);

                        foreach($json as $user){
                            if($user->login == $usuario->login && $user->senha == $usuario->senha){
                                $permissao = 1;
                            }
                        }
                        if ($permissao == 1) {
                        ?>
                        <ul class="nav navbar-nav">
                            <li><a href="pedido.php">Fazer Pedido</a></li>
                            <li><a href="historico_doacao.php">Histórico de Doações</a></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="carteira.php"><span class="glyphicon glyphicon-log-in"></span> Carteira R$:<?=$usuario->carteira?></a></li>
                            <li><a href="deslogar.php"><span class="glyphicon glyphicon-log-in"></span> Sair</a></li>
                        </ul>
                        <?php
                        }
                    } 
                }
                else{
                    $redirect = "index.php";
                    header("location:$redirect");
                }
                ?>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-12">
                    <h1>Doações Abertas:</h1>
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
                                <div class="col-sm-3 conteudo">
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
                <div class="col-md-12">
                    <h1>Doações Realizadas:</h1>
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
                                <div class="col-sm-3 conteudo">
                                    <h5 class="conteudo">Doou: <?=$aux['valor_doado']?></h5>
                                    <h5 class="conteudo">Para: <?=$aux['recebeu_doacao']?></h5>
                                </div>
                            <?php
                            }
                        }
                    }
                    ?>
                </div>
                <div class="col-md-12">
                    <h1>Doações Recebidas:</h1>
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
                                <div class="col-sm-3 conteudo">
                                    <h5 class="conteudo">Recebeu: <?=$aux['valor_doado']?></h5>
                                    <h5 class="conteudo">De: <?=$aux['fez_doacao']?></h5>
                                </div>
                            <?php
                            }
                        }
                    }
                    ?>
                </div>
                <div class="col-md-12">
                    <h1>Doações Completadas:</h1>
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
                                <div class="col-sm-3 conteudo">
                                    <h5 class="conteudo">Finalidade: <?=$aux['finalidade']?></h5>
                                    <h5 class="conteudo">Meta atingida.</h5>
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