<html>
<head>  
	<meta charset="UTF-8">
	<meta name="robots" content="noindex, nofollow" />
	<title>CVIU</title>
	<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
	<script src="jquery.flip.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link href="newstyle.css" type="text/css" rel="stylesheet" />
</head>
<body>
	<div id="header">
	        <h1>Olá Nome</h1>
	        <h2 > Este é o seu calendário universitário</h2>
	</div>


<?php
include 'newcalendar.php';
 
$calendar = new Calendar();
 
echo $calendar->show();
?>


</body>
</html>       