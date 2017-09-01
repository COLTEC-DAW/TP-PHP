<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<meta name="robots" content="noindex, nofollow" />
	<title>CVIU</title>
	<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
	<script src="jquery.flip.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link href="//fonts.googleapis.com/css?family=Open+Sans:400" rel="stylesheet" type="text/css"/>
	<link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
	<script src="js/cover.js"></script> <!-- cover -->
	<script>    AOS.init();  </script>
	<link rel="stylesheet" href="aos-master/dist/aos.css" />
	<script src="aos-master/dist/aos.js"></script>
    <link href="css/style.css" rel="stylesheet" media="all">
     <link rel="icon" type="imagem/png" href="/img/calendaricon.png" />
	
</head>


<body>
	<!-- ********** COVER VIDEO ************* !-->

		


	<div class="container">

		<div class="homepage-hero-module">
		<div class="visible-lg video-container">
			<div class=title-container>
					<img src="img/covericon.png" alt="">
					<br>
					<button type="button" class="btn btn-lg" id="start" align="center">start</button>
					
			</div>
			<div class="filter"></div>
			<video autoplay loop class="fillWidth">
				<source src="cover/MP4/video" type="video/mp4" />Your browser does not support the video tag. I suggest you upgrade your browser.
				<source src="cover/WEBM/video.webm" type="video/webm" />Your browser does not support the video tag. I suggest you upgrade your browser.
			</video>
			<div class="poster hidden">
				<img src="cover/Snapshots/foto.jpg" alt="">
			</div>
		</div>
		</div>

	</div>

	<!-- ********** COVER IMG ************* !-->
	<div class="container">
		
			<div class="hidden-lg">
				<div class=title-container>
					<img src="img/covericon.png" alt="">
					<br>
					<button type="button" class="btn btn-lg" id="start" align="center">start</button>
					
				</div>
			</div>
		


	</div>



	<div id=topo>
		<a name="ancora1" id="ancora1"></a>
		 <nav id="menu">
		    <ul>
		    	<br><br>
		        <li><a href="#">HOME</a></li>
		        <li><a href="#" id="quemsomos1">QUEM SOMOS</a></li>
		        <li><a href="#" id="sobre1">SOBRE</a></li>
				<li><a href="#" id="contato1">CONTATO</a></li>
				<li><a href="adminlogin.php">ADMIN</a></li>
				<li><a href="cadastro.php">CADASTRE-SE</a></li>
		    </ul>
		</nav>
		<h1 id="title"> CVIU </h1>
		<h1 id="univ"></h1>
	</div>


	<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4">
			<h2 class="card-title">login</h2>
						<form action="login.php" method="post">
							<div class="input-group">
								<label for="usuario">Usuário </label>
								<input id="usuario" type="text" class="form-control" name="usuario" placeholder="Usuário">
							</div>
							<div class="input-group">
								<label for="senha">Senha </label>
								<input id="password" type="password" class="form-control" name="password" placeholder="Senha">
							</div>
							<br>
							 <input type="submit" id="button" class="btn btn-outline-info" value="Entrar" />
							 
							 
						</form>
							
     		 	</div>
		<div class="col-md-4">
			 
						
		</div>
	</div>

	<div id=quemsomos>
			<a name="ancora3" id="ancora3"></a>
	        <h1 style="color: white;">Quem somos</h1>
	        <h2 >Grupo do trabalho prático de DAW que tem o objetivo de melhorar o planejamento acadêmico dos alunos do COLTEC (e também passar em DAW)</h2>
			<div class="row">
					<div class="col-md-4">
						
						<img class="img-circle" src="img/ananda.jpg">
						<h2> Ananda Teodoro </h2>
					</div>
					<div class="col-md-4">
						<img class="img-circle" src="img/carol.jpg">
						<h2> Carol Silva </h2>
					</div>
					<div class="col-md-4">
						<img class="img-circle" src="img/clap.jpg">
						<h2> Clap Scofield </h2>
					</div>
			</div>
	</div>
	<div id=sobre>
			<a name="ancora2" id="ancora2"></a>
	        <h1 style="">Sobre</h1>
	        <h2 >A organização mais eficaz para sua produtividade nos estudos. Pioneira na conexão de calendários entre os alunos. Dedicado diretamente para o combate dos procrastinadores.   </h2>
			
	</div>
	<div id=contato>
			<a name="ancora4" id="ancora4"></a>
	        <h1 style="color: white;">Contato</h1>
	        <h2 >Você pode nos encontrar pelo nosso email.</h2>
	        <h2> teodoroananda@gmail.com </h2>
	        <h2> carolasilva99@gmail.com </h2>
	        <h2> clarisse.scofield@gmail.com </h2>
	        
	       
	       
			
	</div>
	
</body>


	<script type="text/javascript">
		$(document).ready(function() {
			$("#topo").hover(function() {
				$("#title").text("Calendário da Vida Universitária");				
			},
			function() {
				$("#title").text("CVIU");
			
			}
			);
		});
	</script>

	<!-- SCROLL ANIMATION -->
	<script type="text/javascript">
		$('#start').on('click', function() {
		  var target_offset = $("#ancora1").offset();
		  var target_top = target_offset.top;
		  $('html, body').animate({ scrollTop: target_top }, 1000);
		});

		$('#quemsomos1').on('click', function() {
		  var target_offset = $("#ancora3").offset();
		  var target_top = target_offset.top;
		  $('html, body').animate({ scrollTop: target_top }, 1000);
		});

		$('#sobre1').on('click', function() {
		  var target_offset = $("#ancora2").offset();
		  var target_top = target_offset.top;
		  $('html, body').animate({ scrollTop: target_top }, 1000);
		});

		$('#contato1').on('click', function() {
		  var target_offset = $("#ancora4").offset();
		  var target_top = target_offset.top;
		  $('html, body').animate({ scrollTop: target_top }, 1000);
		});
	</script>
	
</html>