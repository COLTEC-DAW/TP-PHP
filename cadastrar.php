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
			
			?> <h2>Esse nome já está em uso</h2>
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