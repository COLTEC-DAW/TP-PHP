<?php session_start();
$idMesa =  $_POST["idMesa"];

?>
<!-- Página para exibir qualquer mesa (o ID da mesa a ser mostrada deve vir via post) -->
<!DOCTYPE>
<html>
    <head>
        <title>Mesa <?=$idMesa?></title>
        <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
    </head>
<body>
    <h1><?=$mesa->nome?></h1>
    <p><strong>Mestre: </strong><?= $mesa->mestre ?></p>
    <p><strong>Sistema: </strong><?= $mesa->sistema ?></p>
    <p><strong>Gênero: </strong><?= $mesa->genero ?></p>
    <p><?= $mesa->sinopse ?></p>
    <p><strong>Endereço: </strong><?= $mesa->endereco ?></p>
    <?php listaJogadores(); ?>
</body>
</html>
<?php include "INC/footer.inc"; ?>