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
    <link href="css/cadastro.css" type="text/css" rel="stylesheet" />

       
</head>
    
    <body>
    <div id="header">
	        <h1>Cadastro CVIU</h1>
	</div>



    <div id="cadastrar">
        <a style="text-decoration:none" href="index.php"> <input type="button" id="button" class="sb bradius" value="Login" /> </a>
	<div id="login" class="form bradius" style="top:150px;">

    <div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4">
			<h2 class="card-title">cadastro</h2>
						<form action="cadastrando.php" method="post">
							<div class="input-group">
								<label for="nome">Nome </label>
								<input id="nome" type="text" class="form-control" name="nome" placeholder="Nome">
							</div>
                            <div class="input-group">
								<label for="email">Email </label>
								<input id="email" type="text" class="form-control" name="email" placeholder="Email">
							</div>
							<div class="input-group">
								<label for="senha">Senha </label>
								<input id="senha" type="password" class="form-control" name="senha" placeholder="Senha">
							</div>
							<br>
							 <input type="submit" id="button" class="sb bradius" value="Cadastrar" />
						</form>
						
     		 	</div>
		<div class="col-md-4"></div>
	</div>

</body>
</html>