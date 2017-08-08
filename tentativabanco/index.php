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
	<link href="//fonts.googleapis.com/css?family=Open+Sans:400" rel="stylesheet" type="text/css"/>
	<script src="js/cover.js"></script> <!-- cover -->
	<script>    AOS.init();  </script>
	<link rel="stylesheet" href="aos-master/dist/aos.css" />
	<script src="aos-master/dist/aos.js"></script>
    <link href="css/style.css" rel="stylesheet" media="all">
	
</head>


<body>
	<!-- ********** COVER ************* !-->
	<div class="homepage-hero-module">
    <div class="video-container">
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

	<div id=topo>
		<a name="ancora1" id="ancora1"></a>
		 <nav id="menu">
		    <ul>
		    	<br><br>
		        <li><a href="#">HOME</a></li>
		        <li><a href="#" id="quemsomos">QUEM SOMOS</a></li>
		        <li><a href="#">SOBRE</a></li>
		        <li><a href="#">CONTATO</a></li>
		    </ul>
		</nav>
		<h1 id="title"> CVIU </h1>
		<h1 id="univ"></h1>
	</div>


	<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4">
			<h2 class="card-title">login</h2>
						<form action="userauthentication.php" method="post">
						<input type="radio" name="opcao" value="1"> Estudante 
						 <input type="radio" name="opcao" value="2"> Administrador <br>
							<div class="input-group">
								<label for="inputdefault">Email </label>
								<input id="email" type="text" class="form-control" name="email" placeholder="Email">
							</div>
							<div class="input-group">
								<label for="inputdefault">Senha </label>
								<input id="password" type="password" class="form-control" name="password" placeholder="Senha">
							</div>
							<br>
							 <input type="submit" class="sb bradius" value="Entrar" />
							 <a href="cadastro.php"> <input type="button" class="sb bradius" value="Cadastre-se" /></a>
						</form>
						
     		 	</div>
		<div class="col-md-4"></div>
	</div>

	<div id=sobre>
			<a name="ancora2" id="ancora2"></a>
	        <h1 style="color: white;">Quem somos</h1>
	        <h2 > Blablablabla blablabla blabalba</h2>
			<div class="row">
					<div class="col-md-4">
						
						<img class="img-circle" src="https://kaksimedia.com/kaxi/wp-content/uploads/2015/11/round.jpg">
					</div>
					<div class="col-md-4">
						<img class="img-circle" src="https://kaksimedia.com/kaxi/wp-content/uploads/2015/11/round.jpg">
					</div>
					<div class="col-md-4">
						<img class="img-circle" src="https://kaksimedia.com/kaxi/wp-content/uploads/2015/11/round.jpg">
					</div>
			</div>
	</div>
	<br><br><br>
	
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

		$('#quemsomos').on('click', function() {
		  var target_offset = $("#ancora2").offset();
		  var target_top = target_offset.top;
		  $('html, body').animate({ scrollTop: target_top }, 1000);
		});
	</script>
	
</html>