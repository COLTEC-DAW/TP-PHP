	<!DOCTYPE html >
    <html>


    <head>
    <meta charset="UTF-8">
	<meta name="robots" content="noindex, nofollow" />
	<title>CVIU</title>
	<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
	<script src="jquery.flip.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="css/cadastros.css" type="text/css" rel="stylesheet" />
     <link rel="icon" type="imagem/png" href="/img/calendaricon.png" />

       
</head>
    
    <body>
    <div id="header">
	        <h1>Cadastro</h1>
	</div>


 
    <div id="cadastrar">
      
    <div class="row">
		<div class="col-xs-12 col-sm-4 col-md-4">
			<a href="index.php"> <input style="margin-left:3%; margin-top: 2%;" type="button" id="button" class="btn" value="Login" /> </a>
			
		</div>
		<div class="col-xs-12 col-sm-4 col-md-4">
			<h2 class="card-title">Cadastre-se</h2>
						<form action="cadastrando.php" method="post">
							<div class="input-group">
								<label for="nome">Nome </label>
								<input id="nome" type="text" class="form-control" name="nome" placeholder="Nome">
							</div>
							<div class="input-group">
								<label for="turma">Turma </label>
								<input id="turma" type="text" class="form-control" name="turma" placeholder="Turma">
							</div>
                            <div class="input-group">
								<label for="usuario">Usuário</label>
								<input id="usuario" type="text" class="form-control" name="usuario" placeholder="Usuário">
							</div>
							<div class="input-group">
								<label for="senha">Senha </label>
								<input id="senha" type="password" class="form-control" name="senha" placeholder="Senha">
							</div>
							<br>
							
							 		<input type="submit" id="button" class="btn " value="Cadastrar" />
							
						</form>
						
     		 	</div>
		<div class="col-xs-12 col-sm-4 col-md-4"></div>
	</div>

</body>
</html>