<?php
// Página inicial, apresentada antes do usuário logar e depois de ele logar com o mural do usuário
ob_start();
session_start();
require "INC/funcoes.inc";?>

<!DOCTYPE>
<html>
    <head>
        <title>Bem vindo ao GameMaster</title>
        <link rel="stylesheet" type="text/css" href="STYLE/style.css"></link>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <meta charset=utf-8>
    </head>

    <?php
    // Verifica se login e a senha vem da sessao ou do post
    if(!$_SESSION["login"]) {
        $login = $_POST["login"];
        $senha = $_POST["senha"];
    }
    else {
        $login = $_SESSION["login"];
        $senha = $_SESSION["senha"];
    }

    if(!$login) { //Procedimento se não estiver logado ?>
        <body>
            <div class="container-fluid">
                <!--Espaço pra logo-->
                <div class="col-sm-12 withoutPadding sidebar">
                    <div class="col-sm-5">
                        <h3 class="GameMasterFont">GameMaster</h3>
                    </div>
                    <!--Area de login-->
                    <div class="col-sm-7">
                        <div class="floatRight">
                            <div class="paddingTop">
                                <form class="form-inline" action="index.php" method="post">
                                    <div class="form-group">
                                        <label class="sr-only" for="login">Login</label>
                                        <input type="text" class="form-control" id="login" placeholder="Login" name="login">
                                    </div>
                                    <div class="form-group">
                                        <label class="sr-only" for="senha">Senha</label>
                                        <input type="password" class="form-control" id="senha" placeholder="Senha" name="senha">
                                    </div>
                                    <input type="submit" class="btn btn-primary btnCriarMesa" value="Log In">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 withoutPadding centerbar">
                    <div class="col-sm-7">
                        <div class="paddingTop">
                            <img class="banner" src="STYLE/RPG.jpg">
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="col-sm-12 floatRight">
                            <div class="paddingTop">
                                <h3 class= "fonteMarrom">Não tem conta?</h3>
                                <div class="divider"></div>
                                <a href="cadastro.php"><p class="fonteMarrom">Crie uma aqui</p></a>
                                <form action="cadastrar.php" method="post">
                                    <div class="form-group">
                                        <label class="sr-only" for="nomeCadastro">Nome</label>
                                        <input type="text" class="form-control" id="nomeCadastro" placeholder="Nome" name="nome">
                                    </div>
                                    <div class="form-group">
                                        <label class="sr-only" for="emailCadastro">Nome</label>
                                        <input type="email" class="form-control" id="emailCadastro" placeholder="E-Mail" name="email">
                                    </div>
                                    <div class="form-group">
                                        <label class="sr-only" for="loginCadastro">Nome</label>
                                        <input type="text" class="form-control" id="loginCadastro" placeholder="Login" name="login">
                                    </div>
                                    <div class="form-group">
                                        <label class="sr-only" for="senhaCadastro">Nome</label>
                                        <input type="password" class="form-control" id="senhaCadastro" placeholder="Senha" name="senha">
                                    </div>
                                    <input type="submit" class="btn btn-primary btnCriarMesa" name="submit" value="Cadastrar">
                                </form>
                            </div>
                        </div>            
                    </div>
                </div>
            </div>
            <div class="footer">
                <?php include "INC/footer.inc" ?>
            </div>
        </body> <?php
    }
    else if(validar($login, $senha)) { //Senha correta
        $_SESSION["login"] = $login;
        $_SESSION["senha"] = $senha;
        header("location: home.php");
    }
    else { //Senha incorreta ?>
        <body>
            <h2 class= "fontebranca">Falha no login</h2>
			<a href='/index.php'>Tentar Novamente</a>
        </body> <?php
		}
        include "INC/footer.inc"; ?>
</html>