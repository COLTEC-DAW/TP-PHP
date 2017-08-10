<!DOCTYPE>
<html>
    <head>
        <title>GameMaster login</title>
        <link rel="stylesheet" type="text/css" href="STYLE/style.css"></link>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <meta charset=utf-8>
    </head>
    <body>
        <div class="container-fluid">
            <div class="col-sm-2 sidebar"></div>
            <div class="col-sm-10 centerbar">
                <h2 class= "fonteMarrom">Parece que você não está logado no GameMaster...</h2>
                <form action="index.php" method="post">
                    Login: <input type="text" name="login">
                    Senha: <input type="password" name="senha">
                    <input type="submit" value="LogIn">
                </form>
                <h3 class= "fonteMarrom">Não tem conta?</h3>
                <a href="cadastro.php">Crie uma aqui</a>            
            </div>
        </div>
        <div class="footer">
            <?php include "INC/footer.inc" ?>
        </div>
    </body>
</html>