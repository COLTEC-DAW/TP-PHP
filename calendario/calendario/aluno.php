<html>
<head>  
	<meta charset="UTF-8">
	<meta name="robots" content="noindex, nofollow" />
	<title>CVIU</title>
	<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
	<script src="jquery.flip.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link href="css/aluno.css" type="text/css" rel="stylesheet" />
	<script src="js/aluno.js"></script>
</head>
<body>
	<div id="header">
	        <h1>Olá Nome</h1>
	        <h2 > Este é o seu calendário universitário</h2>
	</div>
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
		include 'calendar.php';
		$calendar = new Calendar();
		$calendar->get();
	?>
			<!-- Modal -->
	<div id="myModal" class="modal fade" role="dialog">
		<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Eventos do pinto</h4>
			</div>
			<div class="modal-body">
				<p>Hoje tem prova de Mat.</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
			</div>
			</div>

		</div>
	</div>
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
                                // Create weeks in a month
                                for( $i=0; $i<$weeksInMonth; $i++ ){
                                     
                                    //Create days in a week
                                    for($j=1;$j<=7;$j++){ 
                                    	$dias =  $calendar->_showDay($i*7+$j);


										 $dia = $i*7+$j;
										 $data = _formaData($year,$month,$dia);
										 compararDatas($data);
                                    	?>
										<li id="li-<?php echo $dias[0]; ?>" class="<?php echo $dias[1];?>">
										<?php echo $dias[2];?>
										</li>
							<?php  
								}
                                }
                            ?>
                            </ul>
                            <div class="clear"></div>   
            			</div>
     			 </div>
            </div>

			<?php
			 function _formaData ($year,$month,$dia) {
        			$data= $year."-".$month."-".$dia;
       			 	$newdata = strtotime($data);
					echo $newdata;
      			    return $newdata;
   			 }


			function compararDatas ($data) {
			$sql = mysqli_query($conexao, "SELECT dia FROM eventos");

			while ($row = $sql->fetch_assoc()) {
  			 $databanco = strtotime($row["dia"]);
			 if ($databanco == $data) {
				echo "<script type='javascript'>alert('Email enviado com Sucesso!');";
				echo "javascript:window.location='aluno.php';</script>";
			 }
			}




			}
			?>

       			






</body>
	<script>
		$("#calendar ul.dates li").click(function(){
			$('#myModal').modal('show');
		});
	</script>
</html>       