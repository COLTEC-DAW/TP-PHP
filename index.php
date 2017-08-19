<?php
// Página inicial, apresentada antes do usuário logar e depois de ele logar com o mural do usuário
ob_start();
session_start();
require "INC/funcoes.inc";?>

<!DOCTYPE>
<html>
    <head>
        <title>Bem vindo ao GameMaster</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="STYLE/style.css"></link>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <meta charset=utf-8>
    </head>
    <body>
        <div class="container-fluid">
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
    <?php
        }
        else if(validar($login, $senha)) { //Senha correta
            $_SESSION["login"] = $login;
            $_SESSION["senha"] = $senha;
            header("location: home.php");
        }
        else { //Senha incorreta ?>
            <!--Espaço pra logo-->
            <div class="col-sm-12 sidebar">
                <h3 class="GameMasterFont">GameMaster</h3>
            </div>
            <div class="col-sm-12 withoutPadding centerbar">
                <div class="col-sm-6 col-sm-offset-3">
                    <div class="jumbotron">
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <span aria-hidden="true" class="close" data-dismiss="alert">&times;</span>
                            <strong>Ops!</strong> Parece que seu login ou senha estão incorretos.
                        </div>
                        <h3 class="fonteMarrom">Faça login em GameMaster</h3>
                        <form action="index.php" method="post">
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
                        <h4 class="fonteMarrom">Ainda não tem login? <a href='/index.php' class="linkVerde">Crie um agora mesmo!</a></h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer"> <?php 
        }
        include "INC/footer.inc"; ?>
        </div>
    </body>
</html>