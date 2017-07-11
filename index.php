<?php
    ob_start(); // Initiate the output buffer
    require "class_user.inc";
    require 'class_doacao.inc';
    require 'verifica_data.php';
    session_start();

    verifica_data();

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
                            <li><a><span class="glyphicon glyphicon-user"></span> Bem vindo: <?=$usuario->nome?></a></li>
                            <li><a href="carteira.php"><span class="glyphicon glyphicon-log-in"></span> Carteira R$: <?=$usuario->carteira?></a></li>
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
      
    <div class="container">
        <h3>Conteúdo</h3>
        <?php
            if($permissao==1){//printa doações disponíveis
                $arquivo = file_get_contents('doacoes.json');
                $json = json_decode($arquivo);
                if (filesize('doacoes.json') != 0){
                    if (!empty($json)) {
                        foreach($json as $dados){
                            $descricao = $dados->finalidade;
                            $meta = $dados->meta;
                            $autor = $dados->autor;
                            $aprovado = $dados->aprovado;
                            $arrecadado = $dados->arrecadado;
                            $id = $dados->id;

                            if($aprovado==1){// && $arrecadado<$meta
                            ?>
                            <div class="col-sm-3 conteudo">
                                <h3 class="conteudo"><?=$descricao?></h3>
                                <h5 class="conteudo">Meta: <?=$meta?></h5>
                                <h5 class="conteudo">Arrecadado: <?=$arrecadado?></h5>
                                <form action="doar.php" method="post">
                                    <input type="hidden" name="id" value=<?=$id?>>
                                    <input type="submit" class="btn btn-default" name="Verificar" value="Doar">
                                </form>
                                <form action="pag_doacoes.php" method="post">
                                    <input type="hidden" name="id" value=<?=$id?>>
                                    <input type="submit" class="btn btn-default" name="Verificar2" value="Leia mais">
                                </form>
                            </div>
                            <?php
                            }
                        }
                    }
                }
            }
            if($eh_admin == 1){
                $arquivo = file_get_contents('doacoes.json');
                $json = json_decode($arquivo);
                if (filesize('doacoes.json') != 0){
                    if(!empty($json)){
                        foreach($json as $dados){
                            $descricao = $dados->finalidade;
                            $meta = $dados->meta;
                            $autor = $dados->autor;
                            $aprovado = $dados->aprovado;
                            $id = $dados->id;

                            //colocar na classe e na seção.
                            $doacao_pendente = new Doacao($descricao, $meta, $autor, $aprovado, $id);
                            $_SESSION["doacao"] = $doacao_pendente;

                            if($aprovado==0){
                            ?>
                            <div class="col-sm-3 conteudo">
                                <h3 class="conteudo"><?=$descricao?></h3>
                                <h5 class="conteudo">Meta: <?=$meta?></h5>
                                <form action="pag_doacoes.php" method="post">
                                    <input type="hidden" name="id" value=<?=$id?>>
                                    <input type="submit" class="btn btn-default" name="Verificar2" value="Leia mais">
                                </form>
                                <form action="aprovar.php" method="post">
                                    <input type="hidden" name="controle" value=<?=$id?>>            
                                    <input type="submit" class="btn btn-default" name="Verificar" value="Aceitar">
                                </form>
                                <form action="reprovar.php" method="post">
                                    <input type="hidden" name="controle" value=<?=$id?>>
                                    <input type="submit" class="btn btn-default" name="Verificar" value="Recusar">
                                </form>

                            </div>
                            <?php
                            }
                        }
                    }
                }
            }
        ?>  
    </div>
</body>
</html>