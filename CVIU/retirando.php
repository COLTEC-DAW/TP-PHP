
<?php
	session_start();
	$nome_session = $_SESSION["email"];
	if(!isset($_SESSION["email"]) || !isset($_SESSION["senha"])){
		header("Location: index.php");
		exit;
	}  
?>
<html>
<head>

<meta charset="UTF-8">
<meta name="robots" content="noindex, nofollow" />
<title>CVIU</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link href="css/cadastros.css" type="text/css" rel="stylesheet" />
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
<center><a href="admin.php"> <input type="button" class="btn" value="Voltar" /></a></center>
</html>