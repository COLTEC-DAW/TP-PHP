<div class="centerbar col-sm-12 col-lg-2 col-md-2">
    <div class="card">
        <img src="STYLE/fotaPerfil.jpeg" class="fotoPerfil" alt="Avatar" style="width:100%">
        <div class="container">
            <h4 class="fonteBranca"><b><?= $_SESSION["user"]->nome ?></b></h4>
        </div>
    </div>
    
        <div class="divisores">
            <h3>Minhas mesas:</h3>
            <?php listaMesasUsuarioResumo(); ?>
        </div>
</div>