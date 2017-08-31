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
</head>
<body>
	<div id="header">
	        <h1>Olá Nome</h1>
	        <h2 > Este é calendário universitário da sua turma</h2>
	</div>

    
               <a href="adicionar.php">  <div id="plus">
                    <i class="fa fa-calendar-plus-o fa-3x" aria-hidden="true"></i>
                </div> </a>
  
               <a href="retirar.php"> <div id="minus">
                    <i class="fa fa-calendar-minus-o fa-3x" aria-hidden="true"></i>
                </div> </a>

	<?php
		include 'calendar.php';
		$calendar = new Calendar();
		$calendar->get();
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
                                // Create weeks in a month
                                for( $i=0; $i<$weeksInMonth; $i++ ){
                                     
                                    //Create days in a week
                                    for($j=1;$j<=7;$j++){ 
                                    	$dias =  $calendar->_showDay($i*7+$j);
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

       			






</body>
</html>       