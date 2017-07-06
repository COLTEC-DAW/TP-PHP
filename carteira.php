<?php
    ob_start(); // Initiate the output buffer
    require "class_user.inc";
    require 'class_doacao.inc';
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
                <a class="navbar-brand" href="index.php">WebSiteName</a>
            </div>

            <?php
                $permissao = 0;
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
                            <li><a href="carteira.php"><span class="glyphicon glyphicon-log-in"></span> Carteira R$: <?=$usuario->carteira?></a></li>
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
      
    <div class="container">

        <form action="deposita.php" method="post">
            <label>Valor que deseja depositar</label>
            <input type="number" class="form-control" name="valor">
            <input type="submit" class="btn btn-default" name="Verificar" value="Depositar">
        </form>

        <?php
            if(isset($_SESSION['error'])){
                if($_SESSION['error'] == "valor_negativo"){
                    ?>
                    <div class="alert alert-danger">
                        Você não pode doar um valor negativo!.
                    </div>
                    <?php
                    $_SESSION['error'] = "valido";
                }
                else if($_SESSION['error'] == "zero"){
                    ?>
                    <div class="alert alert-danger">
                        Você não pode doar esse valor!.
                    </div>
                    <?php
                    $_SESSION['error'] = "valido";
                }
            }
        ?>
    </div>
                           
</body>
</html>