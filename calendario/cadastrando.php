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
	$turma=$_POST['turma'];
	$usuario=$_POST['usuario'];
	$senha=$_POST['senha'];
	


	$sql = mysqli_query($conexao, "INSERT INTO estudante(nome,turma,usuario,senha)
	VALUES('$nome','$turma','$usuario','$senha')");
	echo "<center><h1>Cadastro efetuado!</h1></center>"
?>
<a href="index.php"> <input type="button" class="sb bradius" value="Voltar" /></a>
</body>
</html>