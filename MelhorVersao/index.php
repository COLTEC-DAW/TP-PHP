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
	<script src="js/cover.js"></script>
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
						<form>
							<div class="input-group">
								<label for="inputdefault">Email </label>
								<input id="email" type="text" class="form-control" name="email" placeholder="Email">
							</div>
							<div class="input-group">
								<label for="inputdefault">Senha </label>
								<input id="password" type="password" class="form-control" name="password" placeholder="Senha">
							</div>
							<br>
						</form>
						<button type="button" class="btn btn-lg" >entrar</button>
     		 	</div>
		<div class="col-md-4"></div>
	</div>

	<div id=sobre>
			<a name="ancora2" id="ancora2"></a>
	        <h1 style="color: white;">Quem somos</h1>
	        <h2 > Blablablabla blablabla blabalba</h2>
	        <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum tincidunt turpis, eget cursus dolor pharetra nec. Integer eros tellus, tincidunt a justo vel, ultrices dignissim ipsum. In viverra nisi faucibus odio vestibulum, sit amet pulvinar quam condimentum. Morbi mi augue, bibendum vitae enim eget, gravida efficitur elit. Sed volutpat sem sed ex tincidunt sodales. Integer felis lacus, posuere vitae dictum at, condimentum et enim. Nullam eu finibus orci. In nec lacinia nisi, non faucibus dui. Aliquam ut dui a turpis fringilla finibus. Suspendisse iaculis elementum enim. Cras a metus a est sollicitudin ultrices. Ut at erat consequat, efficitur justo ac, sodales dui. Proin malesuada et purus nec fringilla. In quis dui molestie, gravida nibh eu, dictum nulla. Nam ultrices non eros in laoreet. Curabitur dignissim justo eget magna viverra venenatis. </p>

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

		$('#quemsomos').on('click', function() {
		  var target_offset = $("#ancora2").offset();
		  var target_top = target_offset.top;
		  $('html, body').animate({ scrollTop: target_top }, 1000);
		});
	</script>
	
</html>