<html>
<head>

<title></title> 
</head>

<body>
<?php
	$host = "alunos.coltec.ufmg.br";
	$user = "daw-carol-2017";
	$pass = "c@r0L";
	$banco = "daw-carol-2017";
	$tabela = "estudante";
	$conexao = mysqli_connect($host, $user, $pass) or die(mysqli_error());
	mysqli_select_db($conexao, $banco) or die(mysqli_error());

?>




<?php
	$nome=$_POST['nome'];
	$email=$_POST['email'];
	$senha=$_POST['senha'];


	$sql = mysqli_query($conexao, "INSERT INTO estudante(nome,email,senha)
	VALUES('$nome','$email','$senha')");
	echo "<center><h1>Cadastro efetuado!</h1></center>"
?>

</body>
</html>