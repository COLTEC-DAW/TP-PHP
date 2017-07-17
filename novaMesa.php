<?php 
/*session_start();
//Página para criação de novas mesas
require "classes.php";
require "INC/funcoes.inc";
$arquivo = fopen("DB/dbMesas.json", "r");
$json = "";
while(!feof($arquivo)) $json .= fgets($arquivo);
fclose($arquivo);
$todasAsMesas = json_decode($json);
$todasAsMesas = pegaJson("DB/dbMesas.json");
$novaMesa = new Mesa();
array_push($todasAsMesas, $novaMesa);
$arquivo = fopen("DB/dbMesas.json", "w");
fwrite($arquivo, json_encode($todasAsMesas, JSON_PRETTY_PRINT));
fclose($arquivo);*/
?>
<!DOCTYPE>
<html>
    <head>
        <title>Nova mesa</title>
        <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
        <link rel="stylesheet" type="text/css" href="STYLE/style.css"></link>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    </head>
    <body>
        <div class="container-fluid">
            <?php require "INC/userSideBar.inc"; ?>
            <div class="col-sm-10 centerbar">
                <h1>Página para criar novas mesas</h1>
                <div class="divider"></div>
                <!--<h2><strong>WORK IN PROGRESS</strong></h2>
                <h2>Enquanto você não estava olhando, o faker fez o trabalho. Volte e admire os resultados</h2>-->
                <form action="criaMesa.php" method="POST" id="formMesa">
                    <div class="form-group">
                        <label for="nomeMesa">Nome</label>
                        <input type="text" class="form-control" id="nomeMesa" placeholder="Nome da Mesa">
                    </div>
                    <!--Nome do mestre será passado por POST-->
                    <div class="form-group">
                        <label for="enderecoMesa">Endereço</label>
                        <input type="text" class="form-control" id="enderecoMesa" placeholder="R. Astolfo, 54 - Bela Vista, São Paulo">
                    </div>
                    <div class="form-group">
                        <label for="generoMesa">Gênero</label>
                        <input type="text" class="form-control" id="generoMesa" placeholder="Gênero da Mesa">
                    </div>
                    <div class="form-group">
                        <label for="sistemaMesa">Sistema</label>
                        <input type="text" class="form-control" id="sistemaMesa" placeholder="Sistema da Mesa">
                    </div>
                    <div class="form-group">
                        <label for="sinopseMesa">Sinopse</label>
                        <textarea rows="4" cols="50" class="form-control" id="sinopseMesa" placeholder="Sinopse da Mesa"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary btnCriarMesa">Criar mesa</button>
                </form>
            </div>
        </div>    
        <div class="footer">
            <?php include "INC/footer.inc"; ?>
        <div> 
    </body>
</html>