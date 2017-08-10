<div class="sidebar col-sm-2">
    <div class="card">
        <img src="STYLE/fotaPerfil.jpeg" alt="Avatar" style="width:100%">
        <div class="container">
            <h4 class="fonteBranca"><b><?= $_SESSION["user"]->nome ?></b></h4>
        </div>
    </div>
    <div class="perfil">
        <!-- Optei por deixar os botões sem css, mas podem mudar -->
        <form class="pagePerfil" method="get" action="me.php">
            <button type="submit">Ver perfil</button>
        </form>
        <form method="get" action="logout.php">
            <button type="submit">SAIR</button>
        </form>
        <h3>Minhas mesas:</h3>
        <ul>
            <li><a href="pgMesa.php">Mesa 1</a></li>
            <li><a href="pgMesa.php">Mesa 2</a></li>
            <li><a href="pgMesa.php">Mesa 3</a></li>
        </ul>
    </div>
</div>