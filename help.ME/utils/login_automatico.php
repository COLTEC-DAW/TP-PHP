<?php
    $login = "<script>document.writeln(localStorage.getItem('login'));</script>";
    $senha = "<script>document.writeln(localStorage.getItem('senha'));</script>";
?>

    <div class="card">

	    <form action="../usuario/conf_login.php" method="post" enctype="multipart/form-data">

	        <input id="login_automatico" type="hidden" name="nome" value="">
	        <input id="senha_automatica" type="hidden" name="senha" value="">
	        <p class="center-align">Continuar como <?=$login?>?</p>
	        <div class="center-align input-field">
	            <input type="submit" name="Enviar" class="btn" value="Sim">
	        </div>

	    </form>
	</div>

	<script type="text/javascript">
		document.getElementById("login_automatico").setAttribute("value", localStorage.getItem('login'));
		document.getElementById("senha_automatica").setAttribute("value", localStorage.getItem('senha'));
	</script>