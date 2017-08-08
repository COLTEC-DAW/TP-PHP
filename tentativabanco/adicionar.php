   <form action="adicionando.php" method="post">
              <div class="input-group">
                <label for="inputdefault">Dia </label>
                 <input id="dia" type="text" class="form-control" name="dia">
               </div>
               <div class="input-group">
                   <label for="inputdefault">Turma e Subturma (ex 101A) </label>
                   <input id="id" type="text" class="form-control" name="id" >
                </div>
                <div class="input-group">
                   <label for="inputdefault">Descricao </label>
                   <input id="descricao" type="text" class="form-control" name="descricao" >
                </div>
                 <br>
                <input type="submit" class="sb bradius" value="Adicionar" />
                <a href="admin.php"> <input type="button" class="sb bradius" value="Cancelar" /></a>
 </form>