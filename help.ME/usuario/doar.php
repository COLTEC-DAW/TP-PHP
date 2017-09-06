<?php
    ob_start(); // Initiate the output buffer
    require "../usuario/class_user.inc";
    require "../utils/functions.php";
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
    Guarda_Doacao($controle);
    $dados_da_doacao = $_SESSION["doacao_atual"];
    $formato = Pega_Formato_Imagem($controle, '../imagens/imagens.json');

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>help.ME</title>
        <link rel="icon" type="image/png" sizes="96x96" href="../css/icon.png">
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

    <?php include_once '../utils/nav.inc' ?>

    <div class="container">

        <div class="row">
            <div class="col s6 offset-s3">
                <div class="center-align card-panel doacoes lighten-3">
                    <h3 class="conteudo truncate"><?=$dados_da_doacao->descricao?></h3>
                    <img src="../imagens/<?=$dados_da_doacao->id?>.<?=$formato?>" class="imagens"> 
                    <h5 class="conteudo">Meta: <?=$dados_da_doacao->meta?></h5>
                    <h5 class="conteudo">Arrecadado: <?=$dados_da_doacao->valor_acumulado?></h5>
                    <h5 class="conteudo">Sobre: <p class="sobre"><?=$dados_da_doacao->sobre?></p></h5>       
                </div>        
            </div>        
        </div>    

        <div class="row">
            <div class="col-md-12">
                <div class="col-md-12">
                    <form action="../doacoes/conf_doacao.php" method="post">

                        <div class="input-field">
                            <input type="number" class="form-control" name="valor_doacao">
                            <label>Valor que deseja doar:</label>                        
                        </div>

                        <div class="input-field">
                            <input type="password" class="form-control" name="senha">
                            <label>Senha:</label>                        
                        </div>
                        
                        <input type="hidden" name="id" value=<?=$controle?>>
                        <input type="submit" class="btn btn-default" name="Verificar">
                    </form>

                    <?php
                        $limite = Retorna_Limite($controle);
                    ?>
                        <div class="card-panel red lighten-4">
                            <span>Limite de doação: <?=$limite?></span>
                        </div>

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
<?php include '../utils/footer.inc' ?>
</html>