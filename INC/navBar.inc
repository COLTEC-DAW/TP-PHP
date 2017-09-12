<nav class="navbar navbar-default navbar-static-top withoutBottomMargin withoutBorder">
    <div class="container-reserva navibar">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="GameMasterFont fontePreta navbar-brand" href="home.php">GameMaster</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li><a class="fontePreta" href="home.php">Home</a></li>
                <li>
                    <a class="fontePreta" href="me.php">
                        Perfil <?php
                        if ($_SESSION["user"]->numNotificacoes > 0) //O if não parece estar funcionando ?>
                            <span class="badge"><?= $_SESSION["user"]->numNotificacoes ?></span>
                    </a>
                </li>
                <li><a class="fontePreta" href="logout.php">Sair</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav> 