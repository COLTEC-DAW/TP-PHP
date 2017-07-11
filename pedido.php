<?php
    ob_start(); // Initiate the output buffer
    require "class_user.inc";
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
      	<!--Import Google Icon Font-->
      	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      	<!--Import materialize.css-->
      	<link type="text/css" rel="stylesheet" href="css/materialize.css"  media="screen,projection"/>

        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <nav>
        <div class="container">
                <a class="brand-logo" href="index.php">TratoFeito</a>

            <?php
                if(isset($_SESSION["user"])){
                    $usuario = $_SESSION["user"];
                    if($usuario->login!="admin"){
                        $permissao = 0;
               
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
                        <ul class="left hide-on-med-and-down">
                            <li><a href="pedido.php">Fazer Pedido</a></li>
                            <li><a href="historico_doacao.php">Histórico de Doações</a></li>
                        </ul>
                        <ul class="right hide-on-med-and-down">
                            <li><a><span class="glyphicon glyphicon-user"></span><?=$usuario->nome?></a></li>
                            <li><a href="carteira.php"><span class="glyphicon glyphicon-log-in"></span> Carteira R$:<?=$usuario->carteira?></a></li>
                            <li><a href="deslogar.php"><span class="glyphicon glyphicon-log-in"></span> Sair</a></li>
                        </ul>
                        <?php
                        }
                    }
                    if($usuario->login=="admin"){
                    ?>
                        <ul class="nav navbar-nav">
                            <li><a href="aprovar.php">Aprovar doações</a></li>
                            <li><a href="historico_doacao_aprovada.php">Histórico de Doações Aprovadas</a></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="deslogar.php"><span class="glyphicon glyphicon-log-in"></span> Sair</a></li>
                        </ul>

                    <?php
                    }   
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
                    <h1 class="titulo">Faça suas requisições de doações.</h1>
                </div>

                <div class="col-md-12">
                    <form action="armazena_pedido.php" method="post">

                        <label>Finalidade do pedido:</label>
                        <input type="text" class="form-control" name="finalidade" required>

                        <label>Meta:</label>
                        <input type="number" class="form-control" name="meta" required>

                        <label>Data de encerramento:</label>
                        <input type="date" class="form-control datepicker" name="data" required>

                        <label>Descrição:</label>
                        <textarea name="descricao" class="materialize-textarea"></textarea>

                        <input type="submit" name="Mandar" class="btn btn-default">
                    </form>
                </div>
            </div>
        </div>
        <?php
            if(isset($_SESSION['error'])){
                if($_SESSION['error'] == "ano"){
                    ?>
                    <div class="card-panel red lighten-4">
                        Ano inválido.
                    </div>
                    <?php
                    $_SESSION['error'] = "valido";
                }
                else if($_SESSION['error'] == "mes"){
                    ?>
                    <div class="card-panel red lighten-4">
                        Mês inválido.
                    </div>
                    <?php
                    $_SESSION['error'] = "valido";
                }
                else if($_SESSION['error'] == "dia"){
                    ?>
                    <div class="card-panel red lighten-4">
                        Dia inválido.
                    </div>
                    <?php
                    $_SESSION['error'] = "valido";
                }
                else if($_SESSION['error'] == "igual"){
                    ?>
                    <div class="card-panel red lighten-4">
                        Você não pode inserir a data atual.
                    </div>
                    <?php
                    $_SESSION['error'] = "valido";
                }
            }
        ?>
    </div>
</body>
</html>