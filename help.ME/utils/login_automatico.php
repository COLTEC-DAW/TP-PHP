<?php

    $arquivo = file_get_contents('../utils/usuario_logado.json');
    $json = json_decode($arquivo);

    $login;
    $senha;

    foreach ($json as $temp) {
    	$login = $temp->login;
    	$senha = $temp->senha;
    }

    if($login != null && $senha !=null){
	?>
	    <div class="card">

		    <form action="../usuario/conf_login.php" method="post" enctype="multipart/form-data">

		        <input type="hidden" name="nome" value=<?=$login?>>
		        <input type="hidden" name="senha" value=<?=$senha?>>
		        <p class="center-align">Continuar como <?=$login?> <?=$senha?> ?</p>
		        <div class="center-align input-field">
		            <input type="submit" name="Enviar" class="btn" value="Sim">
		        </div>

		    </form>
		</div>
		<?php
	}
?>