<html>
<head>
<meta charset="UTF-8">
</head>
<body>
     
      <form action="adicionando.php" method="post">
              <div class="input-group">
                <label for="inputdefault">Dia </label>
                 <input id="dia" type="date" class="form-control" name="dia">
               </div>
                <div class="input-group">
                   <label for="inputdefault">Descricao </label>
                   <input id="descricao" type="text" class="form-control" name="descricao" >
                </div>
                <div class="input-group">
                   <label for="inputdefault">Turma e Subturma (Ex: 101A)(Se for evento para toda a escola coloque 0)</label>
                   <input id="turma" type="text" class="form-control" name="turma" >
                </div>
                <div class="input-group">
                   <label for="inputdefault">Horário </label>
                   <input id="hora" type="time" class="form-control" name="hora" >
                </div>
                <div class="input-group">
                   <label for="inputdefault">É evento do coltec? Se sim: 1, se não: 0 </label>
                   <input id="coltec" type="number" class="form-control" name="coltec" >
                </div>

                 <br>
                <input type="submit" class="sb bradius" value="Adicionar" />
                <a href="admin.php"> <input type="button" class="sb bradius" value="Cancelar" /></a>
 </form>
 </body>
 </html>