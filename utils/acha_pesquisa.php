<?php
    ob_start(); 
    require "../usuario/class_user.inc";    
    require '../doacoes/class_doacao.inc';    
    require '../utils/functions.php';
    session_start();    
    $procura = $_POST["procurar"];
    $contador = 0;
    $arquivo = file_get_contents('../doacoes/doacoes.json');
    $json = json_decode($arquivo);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Trato Feito</title>
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
<body class="divider-color">
<main>
    <script type="text/javascript" src="../js/jquery/jquery-3.2.1.js"></script>
    <script type="text/javascript" src="../js/materialize.js"></script>
<?php include 'nav.inc';?>
    <div class="container center-align">
<?php
    echo "<h3>Resultados Encontrados:</h3>";
    if (filesize('../doacoes/doacoes.json') != 0){
        if (!empty($json)) {
        ?>
        <div class="row center-align">			
        <?php
            foreach($json as $dados){
                $descricao = $dados->finalidade;
                $meta = $dados->meta;
                $autor = $dados->autor;
                $aprovado = $dados->aprovado;
                $arrecadado = $dados->arrecadado;
                $id = $dados->id;
                $link = $descricao;
                $termo = $procura;
                $link = strtolower($link);
                $termo = strtolower($termo);
                $pattern = '/'.$termo.'/';
                if(preg_match($pattern,$link) && $aprovado ==1){
                    $contador++;
                    ?>
                        <div class="col s12 m6 l4">
                            <div class="card">
                                <div class="card-content white-text">
                                    <span class="card-title grey-text text-darken-4 truncate"><?=$descricao?></span>
                                    <?php
                                    $formato = Pega_Formato_Imagem($id,'../imagens/imagens.json');
                                    ?>
                                    <img src="../imagens/<?=$id?>.<?=$formato?>" class="imagens"> 
                                    <p class="card-subtitle grey-text text-darken-2 truncate"><?=$dados->descricao?></p>
                                    <span class="blue-text text-darken-2 card-info"><i class="small material-icons">label</i>&nbsp;Meta: <?=$meta?></span>
                                </div>
                                <div class="card-action">
                                    <form action="../usuario/doar.php" method="post">
                                        <input type="hidden" name="id" value=<?=$id?>>
                                        <input type="submit" class="btn btn-default botao" name="Verificar" value="Doar">
                                    </form>
                                    <form action="../usuario/pag_doacoes.php" method="post">
                                        <input type="hidden" name="id" value=<?=$id?>>
                                        <input type="submit" class="btn btn-default botao" name="Verificar2" value="Leia mais">
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php
                }
                else if(Eh_admin() && preg_match($pattern,$link) && $aprovado ==0){
                    $contador++;                    
                    ?>
                    <div class="col s12 m6 l4">
                        <div class="card">
                            <div class="card-content white-text">
                                <span class="card-title grey-text text-darken-4 truncate"><?=$descricao?></span>
                                <?php
                                $formato = Pega_Formato_Imagem($id,'../imagens/imagens.json');
                                ?>
                                <img src="../imagens/<?=$id?>.<?=$formato?>" class="imagens"> 
                                <p class="card-subtitle grey-text text-darken-2 truncate"><?=$dados->descricao?></p>
                                <span class="blue-text text-darken-2 card-info"><i class="small material-icons">label</i>&nbsp;Meta: <?=$meta?></span>
                            </div>
                            <div class="card-action">
                                <form action="../usuario/pag_doacoes.php" method="post">
                                    <input type="hidden" name="id" value=<?=$id?>>
                                    <input type="submit" class="btn btn-default botao" name="Verificar2" value="Leia mais">
                                </form>
                                <form action="../admin/aprovar.php" method="post">
                                    <input type="hidden" name="controle" value=<?=$id?>>            
                                    <input type="submit" class="btn btn-default botao" name="Verificar" value="Aceitar">
                                </form>
                                <form action="../admin/reprovar.php" method="post">
                                    <input type="hidden" name="controle" value=<?=$id?>>
                                    <input type="submit" class="btn btn-default botao" name="Verificar" value="Recusar">
                                </form>
                            </div>
                        </div>
                    </div>
                <?php                }
            }
            ?>
        </div>
            <?php
        }
    }

    if ($contador==0) {
        $redirect = "erro.php";
        header("location:$redirect");
    } 
?>
    </div>
</main>
</body>
<?php include 'footer.inc' ?>
<script type="text/javascript">$(".button-collapse").sideNav();</script>
</html>