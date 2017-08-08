<?php
	$host = "alunos.coltec.ufmg.br";
	$user = "daw-carol-2017";
	$pass = "c@r0L";
	$banco = "daw-carol-2017";
	$tabela = "estudante";
	$conexao = mysqli_connect($host, $user, $pass) or die(mysql_error());
	mysql_select_db($banco) or die(mysql_error());

?>

<html>
<head>
<title></title>
<script type="text/javascript">
	function loginsucesso(){
		setTimeout("window.location='aluno.php'",1000);
	}
	function loginfalho(){
		setTimeout("window.location='index.php'",1000);
	}
</script>


</head>
<body>
<?php
	$email = $_POST['email'];
	$senha = $_POST['senha'];
	$sql = mysqli_query("SELECT * FROM estudante WHERE email='$email' and senha='$senha'") or die(mysql_error());
	$row = mysql_num_rows($sql);
	if($row > 0){
		session_start();
		$nome = mysql_fetch_row($sql);
		$_SESSION["email"]=$_POST['email'];
		$_SESSION["senha"]=$_POST['senha'];
		$_SESSION["nome"] = $nome[0];

		echo "<script>loginsucesso()</script>";
	} else {
		echo "Vc nao entrou bocó";
		echo "<script>loginfalho()</script>";
	}



?>


</body>
</html>