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
date_default_timezone_set('America/Sao_Paulo');
$sql = mysqli_query($conexao, "SELECT dia FROM eventos");

while ($row = $sql->fetch_assoc()) {
    var_dump($row);
   $data = strtotime($row["dia"]);
   echo $data; 
}

?>