<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <!-- Bootstrap core CSS -->
    <link href="../bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Css -->
    <link href="../css/login.css" rel="stylesheet">
</head>
<body>


    <div id="login">
        <h3 class="text-center text-white pt-5">Antes de anunciar, faça o login</h3>
        <h3 id="contaCriada" class="text-center text-white pt-2">Sua conta criada com sucesso!</h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" method="POST" action="../php/login.php">
                            <h3 class="text-center text-info">Login</h3>
                            <div class="form-group">
                                <label for="username" class="text-info">Email:</label><br>
                                <input type="text" class="form-control" name="email" value="<?php emailCookie()?>">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Senha:</label><br>
                                <input type="password" class="form-control" name="senha" value="<?php senhaCookie()?>">
                            </div>
                            <div class="form-group">
                                <input id="lembrarsenha" type="checkbox" name="lembrarSenha"> <label for="checkbox">Lembrar senha</label><br>
                                <input type="submit" value="Login" name="login" class="btn btn-info btn-md">
                            </div>
                            <div id="register-link" class="text-right">
                                <a href="criarConta.php" class="text-info">Criar uma conta</a><br>
                                <a href="/" class="text-info">Voltar</a><br>
                                <p id="usuarioIncorreto">Login Inválido</p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Verifica se o login eh invalido, se for invalido, display error com js
         Verifica se o usuario acabou de criar uma conta, para mostrar a mensagem de sucesso-->
    <?php 
        if (isset($_GET['status'])) {
            $loginInvalido = $_GET['status'];
            if ($loginInvalido == "incorreto") {
                echo "<script>document.getElementById('usuarioIncorreto').style.display = 'block';</script>";
            }
            else if($loginInvalido == "novaconta") {
                echo "<script>document.getElementById('contaCriada').style.display = 'block';</script>";
            }
        }
    ?>

    <!-- Bootstrap core JavaScript -->
    <script src="../bootstrap/jquery.min.js"></script>
	<script src="../bootstrap/bootstrap.min.js"></script>
	<script src="../bootstrap/popper.min.js"></script>

</body>
</html>

<?php
    //Funcao que pega o email do cookie
    function emailCookie() {
        include('../php/conexaoMysql.php');
        
        //Verificar se existe algum valor no cookie
        if (isset($_COOKIE['email'])) {
            echo $_COOKIE['email'];
        }
        //Se nao tiver nada no cookie, retornar um texto vazio
        else {
            echo "";
        }

        $conn->close();
    }

    //Funcao que pega a senha do cookie
    function senhaCookie() {
        include('../php/conexaoMysql.php');
        
        //Verificar se existe algum valor no cookie
        if (isset($_COOKIE['senha'])) {
            echo $_COOKIE['senha'];
        }
        //Se nao tiver nada no cookie, retornar um texto vazio
        else {
            echo "";
        }

        $conn->close();
    }

?>