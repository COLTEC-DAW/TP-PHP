<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
</head>
<body>
	<h2>Faça o login</h2>
	<form method="POST" action="../php/login.php">
        <label>Email:</label> <input type="text" name="email" placeholder="Email" value="<?php emailCookie()?>">
        <label>Senha:</label> <input type="password" name="senha" placeholder="Senha" value="<?php senhaCookie()?>"><br><br>
        <input type="checkbox" name="lembrarSenha">Lembrar Senha<br><br>
        <input type="submit" value="Login" name="login">
    </form>
    <h2>Não possui uma conta?</h2>
    <a href="criarConta.php">Clique aqui para cadastrar</a>
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