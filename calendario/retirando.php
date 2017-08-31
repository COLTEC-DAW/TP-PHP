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

	$id=$_POST['id'];


    $sql = mysqli_query($conexao, "DELETE FROM eventos WHERE id='$id'") or die(mysql_error());
	

?>

</body>
<center><h1>Evento Retirado!</h1></center>
<a href="admin.php"> <input type="button" class="sb bradius" value="Voltar" /></a>
</html>