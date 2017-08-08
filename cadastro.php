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
		<h2>Crie sua conta:</h2>
		<form action="cadastrar.php" method="post">
			Nome: <input type="text" name="nome"> <br>
			Email: <input type="email" name="email"> <br>
			Login: <input type="text" name="login"> <br>
			Senha: <input type="password" name="senha"> <br> <br>
			<input type="submit" name="submit" value="Cadastrar">
		</form>
	</body>
	<?php include "INC/footer.inc" ?>
</html>