
<html>
<head>
	<meta charset="UTF-8">
	<meta name="robots" content="noindex, nofollow" />
	<title>CVIU</title>
	<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
	<script src="jquery.flip.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="principal.css" />
</head>

<body>
	<div id="header">
        <h1>Olá Nome</h1>
        <h2 > Este é o seu calendário universitário</h2>
    </div>

    <!-- calendario  --> 
    <?php include ('calendarioaluno.php'); ?>
    <!-- Pegar mes.
    Imprimir mes no html.
    Chamar funcao numero de dias do mes.  
    FOR com o numero de dias do mes:
    O echo retorna vazio ou o dia para imprimir aqui. -->

    <div id="calendar-wrap">
            <h1> 2017 </h1>;
          
            <!-- IMPRIME MES -->
            <?php 
                $nome_mes = GetNomeMes(GetMes());
                echo "<h1> $nome_mes </h1>";
            ?>

            <!-- DIA DA SEMANA - HTML ESTATICO -->
            <div id="calendar">
                <ul class="weekdays">
                    <li>Domingo</li>
                    <li>Segunda</li>
                    <li>Terça</li>
                    <li>Quarta</li>
                    <li>Quinta</li>
                    <li>Sexta</li>
                    <li>Sábado</li>
                </ul>

            <!-- IMPRIMINDO DIAS AUTOMATICAMENTE -->
            <ul class="days">
            <?php
                for($i = 0; $i <= GetNumeroDias(GetMes()); $i++){
                        $dia = MostreCalendario(GetMes());
                        echo"<li class='day'>";
                        echo"<div class='date'> $dia </div>";                       
                        echo "</li>";
                }
            ?>
            </ul>
    


                <!-- DIAS DO MES ANTERIOR -->

                <ul class="days">
                    <li class="day other-month">
                        <div class="date">26</div>                      
                    </li>

                    <li class="day other-month">
                        <div class="date">27</div>                      
                    </li>
                    <li class="day other-month">
                        <div class="date">28</div>
                        <div class="event">
                            <div class="event-desc">
                                Evento
                            </div>
                            <div class="event-time">
                                1:00 as 3:00
                            </div>
                        </div>                      
                    </li>
                    <li class="day other-month">
                        <div class="date">29</div>                      
                    </li>
                    <li class="day other-month">
                        <div class="date">30</div>                      
                    </li>
                    <li class="day other-month">
                        <div class="date">31</div>                      
                    </li>

                    <!-- DIAS DO MES ATUAL -->

                    <li class="day">
                        <div class="date">1</div>                       
                    </li>
                    <li class="day">
                        <div class="date">2</div>
                        <div class="event">
                            <div class="event-desc">
                                Provinha
                            </div>
                            <div class="event-time">
                                2:00 as 5:00
                            </div>
                        </div>                      
                    </li>
                </ul>

                    <!-- Row #2 -->

                <ul class="days">
                    <li class="day">
                        <div class="date">3</div>                       
                    </li>
                    <li class="day">
                        <div class="date">4</div>                       
                    </li>
                    <li class="day">
                        <div class="date">5</div>                       
                    </li>
                    <li class="day">
                        <div class="date">6</div>                       
                    </li>
                    <li class="day">
                        <div class="date">7</div>
                        <div class="event">
                            <div class="event-desc">
                                Reunião estágio
                            </div>
                            <div class="event-time">
                                6:00 as 8:30
                            </div>
                        </div>                      
                    </li>
                    <li class="day">
                        <div class="date">8</div>                       
                    </li>
                    <li class="day">
                        <div class="date">9</div>                       
                    </li>
                </ul>

                    <!-- Row #3 -->

                <ul class="days">
                    <li class="day">
                        <div class="date">10</div>                      
                    </li>
                    <li class="day">
                        <div class="date">11</div>                      
                    </li>
                    <li class="day">
                        <div class="date">12</div>                      
                    </li>
                    <li class="day">
                        <div class="date">13</div>                      
                    </li>
                    <li class="day">
                        <div class="date">14</div><div class="event">
                            <div class="event-desc">
                                Aula de reposição
                            </div>
                            <div class="event-time">
                                1:00 to 3:00
                            </div>
                        </div>                      
                    </li>
                    <li class="day">
                        <div class="date">15</div>                      
                    </li>
                    <li class="day">
                        <div class="date">16</div>                      
                    </li>
                </ul>

                    <!-- Row #4 -->

                <ul class="days">
                    <li class="day">
                        <div class="date">17</div>                      
                    </li>
                    <li class="day">
                        <div class="date">18</div>                      
                    </li>
                    <li class="day">
                        <div class="date">19</div>                      
                    </li>
                    <li class="day">
                        <div class="date">20</div>                      
                    </li>
                    <li class="day">
                        <div class="date">21</div>                      
                    </li>
                    <li class="day">
                        <div class="date">22</div>
                        <div class="event">
                            <div class="event-desc">
                                Senta e Toca
                            </div>
                            <div class="event-time">
                                9:00 as 12:00
                            </div>
                        </div>                      
                    </li>
                    <li class="day">
                        <div class="date">23</div>                      
                    </li>
                </ul>

                        <!-- Row #5 -->

                <ul class="days">
                    <li class="day">
                        <div class="date">24</div>                      
                    </li>
                    <li class="day">
                        <div class="date">25</div>
                        <div class="event">
                            <div class="event-desc">
                                Coltrekking
                            </div>
                            <div class="event-time">
                                1:00 as 3:00
                            </div>
                        </div>                      
                    </li>
                    <li class="day">
                        <div class="date">26</div>                      
                    </li>
                    <li class="day">
                        <div class="date">27</div>                      
                    </li>
                    <li class="day">
                        <div class="date">28</div>                      
                    </li>
                    <li class="day">
                        <div class="date">29</div>                      
                    </li>
                    <li class="day">
                        <div class="date">30</div>                      
                    </li>
                </ul>

                <!-- Row #6 -->

                <ul class="days">
                    <li class="day">
                        <div class="date">31</div>                      
                    </li>
                    <li class="day other-month">
                        <div class="date">1</div> <!-- Next Month -->                       
                    </li>
                    <li class="day other-month">
                        <div class="date">2</div>                       
                    </li>
                    <li class="day other-month">
                        <div class="date">3</div>                       
                    </li>
                    <li class="day other-month">
                        <div class="date">4</div>                       
                    </li>
                    <li class="day other-month">
                        <div class="date">5</div>                       
                    </li>
                    
                </ul>

            </div><!-- /. calendar -->
        </div><!-- /. wrap -->

</body>

</html>