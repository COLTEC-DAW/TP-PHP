<head>
	<title>GameMaster</title>
	<link rel="stylesheet" type="text/css" href="STYLE/style.css"></link>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
	integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<meta charset=utf-8>
</head>
<?php
	ob_start();
	require "classes.php";
	$nome = $_POST["nome"];
	$email = $_POST["email"];
	$login = $_POST["login"];
	$senha = $_POST["senha"];
	
	$NovaPessoa = new Usuario($nome, $login, $email, $senha);
	$arquivo = fopen("DB/dbUsuarios.json", 'r');
	$dados = "";
	$novo = true;
	
    while(!feof($arquivo)) {
		$dados .= fgets($arquivo);
	}

	$pessoas = json_decode($dados);
	fclose($arquivo);
	
	//Verifica se login ja foi usado
	foreach ($pessoas as $pessoa) {
		if($pessoa->login == $login) {
			$novo = false;
			
			?> <h2 class= "fontebranca">Esse nome já está em uso</h2>
			<a href='cadastro.php'>Tentar Novamente</a> <?php
			
		}
	}
	
	if($novo) {
		array_push($pessoas, $NovaPessoa);
		
		$arquivo = fopen("DB/dbUsuarios.json", 'w');
		fwrite($arquivo, json_encode($pessoas, JSON_PRETTY_PRINT));
		fclose($arquivo);
		//De volta ao login
		header("location: login.php");
	}
?>