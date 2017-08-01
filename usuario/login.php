<?php
    ob_start(); // Initiate the output buffer
    require "../utils/functions.php";
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
<main>
    <meta charset="utf-8">

    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="../css/materialize.css"  media="screen,projection"/>
    <link rel="stylesheet" href="../fonts/font-awesome-4.7.0/css/font-awesome.css">

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
    <script type="text/javascript" src="../js/jquery/jquery-3.2.1.js"></script>
    <script type="text/javascript" src="../js/materialize.js"></script>

    <nav class="navbar indigo darken-4">
        <div class="container">
            <a class="brand-logo" href="../index.php">TratoFeito</a>
            <ul class="right">
                <li><a href="cadastro.php"><i class="fa fa-user-plus" aria-hidden="true"></i> Cadastrar</a></li>
                <li><a href="login.php"><i class="fa fa-sign-in" aria-hidden="true"></i> Entrar</a></li>
            </ul>   
        </div>
    </nav>

    <div class="container center-align">
        <div class="col l2">
            <form action="conf_login.php" method="post" enctype="multipart/form-data">

                <div class="input-field">
                <input type="text" name="nome" required>
                <label>Login</label>                        
                </div>

                <div class="input-field">
                <input id="user_password" type="password" name="senha" required>
                <label>Senha</label>                        
                </div>

                <div class=" center-align">
                    <input type="submit" name="Entrar" class="btn btn-default btnform indigo">
                </div>
            </form>
            <a href = "cadastro.php"><button type="button" class="btn btn-default indigo">Criar conta</button></a>
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
</main>
</body>
<?php include '../footer.inc' ?>
</html>