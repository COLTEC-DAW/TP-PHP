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
	$descricao=$_POST['descricao'];
	$turma=$_POST['turma'];
	$hora=$_POST['hora'];
	$coltec=$_POST['coltec'];


	$sql = mysqli_query($conexao, "INSERT INTO eventos(dia,descricao,turma,hora,coltec)
	VALUES('$dia','$descricao','$turma','$hora','$coltec')");
	

?>
<center><h1>Ok!</h1></center>
<a href="admin.php"> <input type="button" class="sb bradius" value="Voltar" /></a>
</body>
</html>