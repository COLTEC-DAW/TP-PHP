<?php
    ob_start(); // Initiate the output buffer
    require "../usuario/class_user.inc";
    require '../doacoes/class_doacao.inc';
    session_start();
    $controle;

    if(isset($_SESSION['controle'])){
        $controle = $_SESSION['controle'];
    }


    if(isset($_POST['id'])){
        $controle = $_POST['id'];
        $_SESSION['controle'] = $controle;
    }

?>

<?php
    $permissao = 0;
    if(isset($_SESSION["user"])){
        $usuario = $_SESSION["user"];

        $arquivo = file_get_contents('users.json');
        $json = json_decode($arquivo);

        foreach($json as $user){
            if($user->login == $usuario->login && $user->senha == $usuario->senha){
                $permissao = 1;
            }
        }
        if ($permissao == 0) {
            $redirect = "index.php";
            header("location:$redirect");
        }
    }
    else{
        $redirect = "index.php";
        header("location:$redirect");
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
                }
                else{
                    $redirect = "index.php";
                    header("location:$redirect");                
                }
                ?>
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
                        $jsonString = file_get_contents('../doacoes/doacoes.json');
                        $data = json_decode($jsonString, true);


                        foreach ($data as $key => $entry) {
                            if ($entry['id']==$controle) {
                                $valor_permitido = $entry['meta'] - $entry['arrecadado'];

                                echo "Limite de Doação (Valor necessário para que o pedido atenda a meta): ".$valor_permitido;
                            }
                        }
                    ?>

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
                            else if($_SESSION['error'] == "valor_excede_limite"){
                                ?>
                                <div class="alert alert-danger">
                                    O valor está acima do limite!.
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
                            else if($_SESSION['error'] == "senha"){
                                ?>
                                <div class="alert alert-danger">
                                    Senha incorreta!.
                                </div>
                                <?php
                                $_SESSION['error'] = "valido";
                            }
                            else if($_SESSION['error'] == "saldo_insuficiente"){
                                ?>
                                <div class="alert alert-danger">
                                    Saldo insuficiente! Adicione dinheiro a sua carteira.
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