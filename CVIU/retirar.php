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
		 <title>CVIU</title>
    	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   		<link href="css/evento.css" type="text/css" rel="stylesheet" />
   		 <link rel="icon" type="imagem/png" href="/img/calendaricon.png" />
</head>
<body>

		<div id="header">
          <h1>Remover evento</h1>
      </div>
      <br>
   		<form action="retirando.php" method="post">
                <div class="input-group">
                   <label for="inputdefault">Id do evento que você deseja retirar (pode ser encontrado no corpo do evento) </label>
                   <input id="id" type="text" class="form-control" name="id" >
                </div>
                 <br>
                <input type="submit" class="btn btn-outline-info" value="Retirar" />
                <a href="admin.php"> <input type="button" class="btn btn-outline-info" value="Cancelar" /></a>
 </form>
 </body>
 </html>