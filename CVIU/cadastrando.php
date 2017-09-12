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
?>

<center><h1>Cadastro efetuado!</h1></center>

<center><a href="index.php"> <input type="button" class="btn" value="Voltar" /></a></center>
</body>
</html>