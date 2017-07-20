<?php
    ob_start(); // Initiate the output buffer
    require "../utils/functions.php";
    session_start();
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
                if(IsLogado("users.json")){
                ?>
                    <ul class="nav navbar-nav">
                        <li><a href="pedido.php">Fazer Pedido</a></li>
                        <li><a href="historico_doacao.php">Histórico de Doações</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="deslogar.php"><span class="glyphicon glyphicon-log-in"></span> Sair</a></li>
                    </ul>
                    <?php
                }
                if(Eh_Admin()){
                ?>
                    <ul class="nav navbar-nav">
                        <li><a href="../admin/historico_doacao_aprovada.php">Histórico de Doações Aprovadas</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="deslogar.php"><span class="glyphicon glyphicon-log-in"></span> Sair</a></li>
                    </ul>

                <?php
                }
                else{
                ?>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="cadastro.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                        <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                    </ul>
                <?php
                }
                ?>
        </div>
    </nav>


    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-12">
                    <form action="conf_login.php" method="post">

                        <label>Login:</label>
                        <input type="text" class="form-control" name="nome" required>

                        <label>Senha:</label>
                        <input id="user_password" type="password" class="form-control" name="senha" required>

                        <input type="submit" class="btn btn-default" name="Verificar">
                    </form>
                    <a href = "cadastro.php"><button type="button" class="btn btn-primary">Criar conta</button></a>
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