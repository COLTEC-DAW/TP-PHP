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
        <h2 class= "fontebranca">Parece que você não está logado no GameMaster...</h2>
        <form action="index.php" method="post">
            Login: <input type="text" name="login">
            Senha: <input type="password" name="senha">
            <input type="submit" value="LogIn">
        </form>
        <h3 class= "fontebranca">Não tem conta?</h3>
        <a href="cadastro.php">Crie uma aqui</a>
        <?php include "INC/footer.inc" ?>
    </body>
</html>