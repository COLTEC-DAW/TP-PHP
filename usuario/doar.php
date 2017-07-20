<?php
    ob_start(); // Initiate the output buffer
    require "../usuario/class_user.inc";
    require "../utils/functions.php";
    require '../doacoes/class_doacao.inc';
    session_start();
    if(!IsLogado("users.json")){
        $redirect = "../index.php";
        header("location:$redirect");
    }
    $controle;

    if(isset($_SESSION['controle'])){
        $controle = $_SESSION['controle'];
    }

    if(isset($_POST['id'])){
        $controle = $_POST['id'];
        $_SESSION['controle'] = $controle;
    }

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
                <a class="navbar-brand" href="../index.php">TratoFeito</a>
            </div>
                <?php
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
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-12">
                    <form action="../doacoes/conf_doacao.php" method="post">

                        <label>Valor que deseja doar:</label>
                        <input type="number" class="form-control" name="valor_doacao">

                        <label>Senha:</label>
                        <input type="password" class="form-control" name="senha">

                        <input type="hidden" name="id" value=<?=$controle?>>

                        <input type="submit" class="btn btn-default" name="Verificar">
                    </form>

                    <?php
                        $limite = Retorna_Limite($controle);
                    ?>
                        <div class="card-panel red lighten-4">
                            <span>Limite de doação: <?=$limite?></span>
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
            </div>
        </div>
    </div>
</body>
</html>