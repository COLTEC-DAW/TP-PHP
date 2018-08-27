<div id="modalAddEvent" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Adicionar Evento</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row p-3">
          <h5 class="col-3">Nome do evento</h5>
          <input type="name" class="col-9 form-control" name="name">
        </div>
        <div class="row p-3">
          <h5 class="col-3">Local do evento</h5>
          <input type="name" class="col-9 form-control" name="place">
        </div>
        <div class="row p-3">
          <h5 class="col-3">Data do evento</h5>
          <input type="name" class="col-9 form-control" name="description">
        </div>
        <div class="row p-3">
          <h5 class="col-3">Preço do ingresso</h5>
          <input type="number" class="col-9 form-control" name="price">
        </div>
        <div class="row p-3">
          <h5 class="col-3">Importância</h5>
          <label class="col-3">
            <input type="radio" name="importance" class="form-control" value="0">
            <p>0</p>
          </label>
          <label class="col-3">
            <input type="radio" name="importance" class="form-control" value="1">
            <p>1</p>
          </label>
          <label class="col-3">
            <input type="radio" name="importance" class="form-control" value="2">
            <p>2</p>
          </label>
        </div>
      </div>
      <div class="modal-footer">
          <button type="reset" class="btn btn-warning">Limpar</button>
          <button type="submit" class="btn btn-success">Adicionar</button>
      </div>
    </div>
  </div>
</div>
