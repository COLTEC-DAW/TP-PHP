<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Criar Conta</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

    <form method="POST" action="../php/criarConta.php">
        Nome:<input type="text" name="nome"><br>
        Email:<input type="text" name="email"><br>
        Senha:<input type="password" name="senha"><br>
        <input type="submit" name="criarConta" value="Criar conta">
    </form>
    
</body>
</html>