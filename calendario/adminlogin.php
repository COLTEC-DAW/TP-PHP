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

	<div id=topo>
		<a name="ancora1" id="ancora1"></a>
		 <nav id="menu">
		    <ul>
		    	<br><br>
		        <li><a href="#">LOGIN ADMINISTRADOR</a></li>
		    </ul>
		</nav>
		<h1 id="title"> CVIU </h1>
		<h1 id="univ"></h1>
	</div>


	<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4">
			<h2 class="card-title">login admin</h2>
						<form action="loginadmin.php" method="post">
							<div class="input-group">
								<label for="email">Email </label>
								<input id="email" type="text" class="form-control" name="email" placeholder="Email">
							</div>
							<div class="input-group">
								<label for="senha">Senha </label>
								<input id="password" type="password" class="form-control" name="password" placeholder="Senha">
							</div>
							<br>
							 <input type="submit" id="button" class="sb bradius" value="Entrar" />
							 
							 
						</form>
						
     		 	</div>
		<div class="col-md-4"></div>
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