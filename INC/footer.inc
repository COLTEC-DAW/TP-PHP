<!-- Footer genérico -->
<footer>
    <h5 class="fonteBranca">© subCUBE Enterprises + VHS Productions<h5>
    <p class="fontebranca"><?= $_SESSION["user"]->nome ?></p>
    <p class="fontebranca"><?= $_SESSION["user"]->id ?></p>
    <?php $mesas = var_dump($_SESSION["user"]->mesas); ?>
    <p class="fontebranca"><?= $mesas ?></p>
</footer>