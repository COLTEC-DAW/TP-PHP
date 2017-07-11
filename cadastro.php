<?php
    ob_start(); // Initiate the output buffer
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
                <a class="navbar-brand" href="index.php">TratoFeito</a>
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
                            <li><a href="deslogar.php"><span class="glyphicon glyphicon-log-in"></span> Sair</a></li>
                        </ul>
                        <?php
                        }
                    }
                    if($usuario->login=="admin"){
                        $eh_admin = 1;
                    ?>
                        <ul class="nav navbar-nav">
                            <li><a href="historico_doacao_aprovada.php">Histórico de Doações Aprovadas</a></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="deslogar.php"><span class="glyphicon glyphicon-log-in"></span> Sair</a></li>
                        </ul>

                    <?php
                    }   
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
                    <form action="conf_cadastro.php" method="post">

                        <label>Nome:</label>
                        <input type="text" class="form-control" name="name" required>

                        <label>Login:</label>
                        <input type="text" class="form-control" name="nome" required>

                        <label>Senha:</label>
                        <input type="password" class="form-control" name="senha" required>

                        <label>Email:</label>
                        <input type="text" class="form-control" name="email" required>

                        <input type="submit" class="btn btn-default" name="Verificar">
                    </form>
                    <?php
                        if(isset($_SESSION['error'])){
                            if($_SESSION['error'] == "admin"){
                                ?>
                                <div class="alert alert-danger">
                                    Não é possível criar uma conta com login igual a admin.
                                </div>
                                <?php
                                $_SESSION['error'] = "valido";
                            }
                            else if($_SESSION['error'] == "existe"){
                                ?>
                                <div class="alert alert-warning">
                                    Login já existente
                                </div>
                                <?php
                                $_SESSION['error'] = "valido";
                            }
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>