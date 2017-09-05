<html>
<head>
    <meta charset="UTF-8">
    <title>CVIU</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="css/evento.css" type="text/css" rel="stylesheet" />
     <link rel="icon" type="imagem/png" href="/img/calendaricon.png" />
</head>
<body>

     <div id="header">
          <h1>Novo evento</h1>
      </div>

      <form action="adicionando.php" method="post">
              <div class="input-group">
                <label for="inputdefault">Dia </label>
                 <input id="dia" type="date" class="form-control" name="dia">
               </div>
               <br>
                <div class="input-group">
                   <label for="inputdefault">Descrição </label>
                   <input id="descricao" type="text" class="form-control" name="descricao" >
                </div>
                <br>
                <div class="input-group">
                   <label for="inputdefault">Turma e Subturma (Ex: 101A)(Se for evento para toda a escola coloque 0)</label>
                   <input id="turma" type="text" class="form-control" name="turma" >
                </div>
                <br>
                <div class="input-group">
                   <label for="inputdefault">Horário </label>
                   <input id="hora" type="time" class="form-control" name="hora" >
                </div>
                <br>
                <div class="input-group">
                   <label for="inputdefault">É evento do coltec? Se sim: 1, se não: 0 </label>
                   <input id="coltec" type="number" class="form-control" name="coltec" >
                </div>

                 <br>
                <input type="submit" class="btn btn-outline-info" value="Adicionar" />
                <a href="admin.php"> <input type="button" class="btn btn-outline-info" value="Cancelar" /></a>
 </form>
 </body>
 </html>