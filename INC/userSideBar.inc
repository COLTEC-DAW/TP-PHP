<div class="sidebar col-sm-12 col-lg-2 col-md-2">
    <div class="card">
        <img src="STYLE/fotaPerfil.jpeg" alt="Avatar" style="width:100%">
        <div class="container">
            <h4 class="fonteBranca"><b><?= $_SESSION["user"]->nome ?></b></h4>
        </div>
    </div>
    <div class="perfil col-sm-12 col-md-8 col-lg-8 ">
        <!-- Optei por deixar os botões sem css, mas podem mudar -->
        <form class="pagePerfil" method="get" action="me.php">
            <button type="submit">Ver perfil</button>
        </form>
        <form class="pagePerfil" method="get" action="home.php">
            <button type="submit">GO HOME</button>
        </form>
        <form method="get" action="logout.php">
            <button type="submit">SAIR</button>
        </form>
        <h3>Minhas mesas:</h3>
        <?php listaMesasUsuarioResumo(); ?>
    </div>
</div>