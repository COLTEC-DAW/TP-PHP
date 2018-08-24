<div class="modal fade" id="modalAddEvent" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal">
          <span>&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="card col-10 offset-1">
          <div class="card-header row">
            <h3>Adicionar Evento</h3>
          </div>
          <div class="card-body">
            <div class="row p-3">
              <h5 class="card-title col-3">Nome do evento</h5>
              <input type="name" class="col-9" name="name">
            </div>
            <div class="row p-3">
              <h5 class="card-title col-3">Local do evento</h5>
              <input type="name" class="col-9" name="place">
            </div>
            <div class="row p-3">
              <h5 class="card-title col-3">Data do evento</h5>
              <input type="name" class="col-9" name="description">
            </div>
            <div class="row p-3">
              <h5 class="card-title col-3">Preço do ingresso</h5>
              <input type="number" class="col-9" name="price">
            </div>
          </div>
          <div class="card-footer">
            <button type="reset" class="btn btn-warning col-12">Limpar</button>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Adicionar</button>
      </div>
    </div>
  </div>
</div>
