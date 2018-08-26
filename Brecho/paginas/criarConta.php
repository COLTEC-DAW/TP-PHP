<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <!-- Bootstrap core CSS -->
    <link href="../bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Css -->
    <link href="../css/criarConta.css" rel="stylesheet">
</head>
<body>


    <div id="login">
        <h3 class="text-center text-white pt-5">Antes de anunciar, crie sua conta</h3>
        <h3 class="erro" class="text-center text-white pt-2">Você não inseriu todos os dados</h3>
        <h3 class="erro" class="text-center text-white pt-2">Email incorreto</h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" method="POST" action="../php/criarConta.php">
                            <h3 class="text-center text-info">Criar conta</h3>
                            <div class="form-group">
                                <label for="username" class="text-info">Nome:</label><br>
                                <input type="text" class="form-control" name="nome">
                            </div>
                            <div class="form-group">
                                <label for="username" class="text-info">Email:</label><br>
                                <input type="text" class="form-control" name="email">
                            </div>
                            <div class="form-group">
                                <label for="username" class="text-info">Telefone:</label><br>
                                <input type="number" class="form-control" name="telefone">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Senha:</label><br>
                                <input type="password" class="form-control" name="senha">
                            </div>
                            <div class="form-group">
                                <br><input type="submit" value="Criar conta" name="login" class="btn btn-info btn-md">
                            </div>
                            <div id="register-link" class="text-right">
                                <a href="login.php" class="text-info">Login</a><br>
                                <a href="/" class="text-info">Voltar</a><br>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Verifica se o usuario acabou de criar uma conta, para mostrar a mensagem de sucesso
        Verifica se digitou um email valido -->
        <?php 
        if (isset($_GET['status'])) {
            $status = $_GET['status'];
            if ($status == "faltaDados") {
                echo "<script>document.getElementsByClassName('erro')[0].style.display = 'block';</script>";
            }
            else if ($status == "emailIncorreto") {
                echo "<script>document.getElementsByClassName('erro')[1].style.display = 'block';</script>";
            }
        }
    ?>

    <!-- Bootstrap core JavaScript -->
    <script src="../bootstrap/jquery.min.js"></script>
	<script src="../bootstrap/bootstrap.min.js"></script>
	<script src="../bootstrap/popper.min.js"></script>

</body>
</html>