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
	$tabela = "eventos";
	$conexao = mysqli_connect($host, $user, $pass) or die(mysqli_error());
	mysqli_select_db($conexao, $banco) or die(mysqli_error());

?>
<?php
	$dia=$_POST['dia'];
	$id=$_POST['id'];
	$descricao=$_POST['descricao'];


	$sql = mysqli_query($conexao, "INSERT INTO eventos(dia,id,descricao)
	VALUES('$dia','$id','$descricao')");
	echo "<center><h1>Cadastro efetuado!</h1></center>"
?>

</body>
</html>