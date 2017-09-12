<?php
	$host = "alunos.coltec.ufmg.br";
	$user = "daw-carol-2017";
	$pass = "c@r0L";
	$banco = "daw-carol-2017";
	$conexao = mysqli_connect($host, $user, $pass) or die(mysqli_error());
	mysqli_select_db($conexao, $banco) or die(mysqli_error());
	session_start();
?>

<html>
<head>

<?php
	$email = $_POST['email'];
	$senha = $_POST['password'];
	$sql = mysqli_query($conexao , "SELECT * FROM Admin WHERE email='$email' and senha='$senha'") or die(mysqli_error());
	$row = mysqli_num_rows($sql);
	if($row > 0){
		while($nome = mysqli_fetch_row($sql)) {
		$_SESSION["email"]=$_POST['email'];
		$_SESSION["senha"]=$_POST['password'];
		$_SESSION["nome"] = $nome['nome'];

		
		}
	  ?> 
	  
		<script>setTimeout("window.location='admin.php'",1000);</script>
	<?php
	} else {
	  ?>
	  <script>setTimeout("window.location='index.php'",1000);</script>
	<?php
	}



?>

</head>
<body>
</body>
</html>