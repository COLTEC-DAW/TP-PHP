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
	<meta name="robots" content="noindex, nofollow" />
	<title>CVIU</title>
	<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
	<script src="jquery.flip.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
	<link href="css/admin.css" type="text/css" rel="stylesheet" />
	 <link rel="icon" type="imagem/png" href="/img/calendaricon.png" />
</head>
<body>
	<div id="header">
			<a href="logout.php"> <input type="button" id="buttton" class="btn" value="Logout" /></a>
			<h1>Olá <?php echo $nome_session ?></h1>
	        <h2 > Este é calendário universitário da sua turma</h2>
			
	</div>

    
               <center><a href="adicionar.php">  <div id="icones">
                    <i class="fa fa-calendar-plus-o fa-3x" aria-hidden="true"></i></a>
					<a href="retirar.php"> <i class="fa fa-calendar-minus-o fa-3x" aria-hidden="true"></i>
					</a> </div> </center>

	<?php
		include 'calendar.php';
		$calendar = new Calendar();
		$calendar->get();
		include 'conexao.php';
	?>
	<div id="calendar">
	<div class="box">
			<div class="header">
				<?php $array = $calendar->_createNavi(); ?>
				<a class="prev" href="<?php echo $array[0]; ?>"> Prev</a>
				<span class="title"><?php echo $array[1]; ?></span>
			 <a class="next" href="<?php echo $array[2]; ?>">Next</a>
		 </div>
		 <br><br>
		 <div class="box-content">
			 <ul class="label">
				 <?php 
					 foreach($calendar->dayLabels as $index=>$label){ ?>
						 <li class="<?php echo $calendar->_createLabels();?>">
						 <?php echo $label; ?>
						 </li>
				  <?php
				 }
				 ?>
			 </ul>
			 <div class="clear"></div> 
			 <ul class="dates">    
				 <?php
					 $weeksInMonth = $calendar->_weeksInMonth($month,$year);
					 $conexao = Conexao::getInstance(); 
					 $sql = mysqli_query($conexao, "SELECT * FROM eventos");
					 compararDatas($sql, $conexao, $nome_session);
					 
					 
							 // Create weeks in a month
							 for( $i=0; $i<$weeksInMonth; $i++ ){
								  
								 //Create days in a week
								 for($j=1;$j<=7;$j++){ 
									 $dias =  $calendar->_showDay($i*7+$j);
									 $dia =$dias[2];
									 
									 

									 
									 if($dia<10) {
										 $dia='0'.$dia;
									 }
									 $date = $_GET['year'].'-'.$_GET['month'].'-'.$dia;
									 $qtd = getEventos($date,$conexao,$nome_session);
									 
									 if($qtd==0) {
									 ?>
									 
									 <li id="li-<?php echo $dias[0]; ?>" class="<?php echo $dias[1];?>">
									 <?php echo $dias[2];?>
									 
									 </li>
									 <?php 
									 }
									 else { 
										 
									 ?>

									 <li id="li-<?php echo $dias[0]; ?>" class="<?php echo $dias[1];?>"data-toggle="modal" data-target="#myModal-<?php echo $date ?>">
									 <?php echo $dias[2];?>


						 <?php 
									 
							 }
							 }
						 }
						 
						 ?>
						 </ul>
						 <div class="clear"></div>   
					 </div>
			   </div>
		 </div>

		 <?php
			 function getEventos($date,$conexao,$nome_session){
				 $sql = mysqli_query($conexao, "SELECT * FROM eventos WHERE `dia`='$date'");
				 $sql2 = mysqli_query($conexao, "SELECT eventos.dia FROM Admin, eventos WHERE ((Admin.turma = eventos.turma) OR( eventos.coltec = 1 )) AND Admin.email ='$nome_session'   AND eventos.dia = '$date' ");
				 
				 $count=0;
	 
				 while ($row = $sql2->fetch_assoc()) 
				 {

				 $count++;

				 }
				 
				 return $count; 

			 }
			 
							 

			 function compararDatas ($sql, $conexao,$nome_session) 
			 {
				 while ($row = $sql->fetch_assoc()) 
				 {
					 $databanco = $row["dia"];
					 $sql2 = mysqli_query($conexao, "SELECT eventos.dia FROM Admin, eventos WHERE ((Admin.turma = eventos.turma) OR( eventos.coltec = 1 )) AND Admin.email ='$nome_session'   AND eventos.dia = '$databanco' ");
					 while ($row2 = $sql2->fetch_assoc()) {
					 
		 ?>
					 <style> div#calendar ul.dates li#li-<?php echo $databanco ?>{ background-color: #941E2E;} 
					 		div#calendar ul.dates li#li-<?php echo $databanco ?>:hover{ background-color: #751824;}
					 </style>

					 <!-- Modal -->
					 <div id="myModal-<?php echo $databanco ?>" class="modal fade" role="dialog">
					 <div class="modal-dialog">

						 <!-- Modal content-->
						 <div class="modal-content">
						 <div class="modal-header">
							 <button type="button" class="close" data-dismiss="modal">&times;</button>
							 <h4 class="modal-title">Eventos do dia</h4>
						 </div>
						 <div class="modal-body">
							 <p><?php
							 $sql2 = mysqli_query($conexao, "SELECT eventos.dia, eventos.descricao, eventos.hora, eventos.id FROM Admin, eventos WHERE ((Admin.turma = eventos.turma) OR( eventos.coltec = 1 )) AND Admin.email ='$nome_session'   AND eventos.dia = '$databanco' ");
							 while ($row2 = $sql2->fetch_assoc()) {
								 $descricao = $row2["descricao"];
								 $horario = $row2["hora"]; 
								 $id = $row2["id"];
								 echo "Id:   ";
								 echo $id;
								 echo "<br>";
							 echo "Horário do evento:   ";
							 echo $horario;
							 echo "<br>";
							 echo "Descrição do evento:    ";
							 echo $descricao; 
							 echo "<br><br>";
							 }
							  ?></p>
						 </div>
						 <div class="modal-footer">
							 <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
						 </div>
						 </div>

					 </div>
					 </div>		


		 <?php
					 }
		 }
		 }	
		 ?>






</body>
</html>       