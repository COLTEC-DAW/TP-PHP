<div class="sidebar col-xs-12 col-sm-12 col-lg-2 col-md-2">
    <div class="card">
        <img src="STYLE/fotaPerfil.jpeg" class="fotoPerfil" alt="Avatar" style="width:100%">
        <div class="container">
            <h4 class="fonteBranca"><b><?= $_SESSION["user"]->nome ?></b></h4>
        </div>
    </div>
    
    <div class="divisores">
        <h2>Minhas mesas:</h2> <?php
        $todasAsMesas = pegaJson("DB/dbMesas.json");
        foreach ($_SESSION["user"]->mesas as $codMesa){ ?>
            <div class="divisores"> <?php
                $mesinha = pegaPorId($todasAsMesas, $codMesa); ?>
                <h3><?=$mesinha->nome?></h3>
                <form method="post" action="pgMesa.php">
                    <input type="hidden" name="idMesa" value="<?= $mesinha->id ?>">
                    <button type="submit" class="btn btnCriarMesa fonteBranca">Detalhes</button>
                </form>    
            </div> <?php
        } ?>
    </div>
</div>