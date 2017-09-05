
<nav class="navbar default-primary-color hide-on-med-and-down">

	<div class="nav-wrapper">
		<div class="container center-align">
			<a class="brand-logo" href="../index.php"><i class="fa fa-handshake-o" aria-hidden="true"></i></a>
			<?php
			$logado = IsLogado("../usuario/users.json");
				if($logado){
					$usuario = $_SESSION['user'];
				?>

					<ul class="right">
						<li>
							<form action="../utils/acha_pesquisa.php" method="post">
								<div class="input-field">
									<i class="white-text material-icons prefix">search</i>
									<input type="text" placeholder="Buscar" id="autocomplete-input" class="autocomplete white-text" name="procurar">
								</div>
							</form>
						</li>
						<li><a href="../usuario/pedido.php">Fazer Proposta</a></li>
						<li><a href="../usuario/historico_doacao.php">Histórico</a></li>
						<li class="dropdown-button" data-activates="dropdown"><a><i class="fa fa-user" aria-hidden="true"></i>&nbsp;<?=$usuario->nome?><i class="material-icons right">arrow_drop_down</i></a></li>
						<ul id='dropdown' class='dropdown-content'>
							<li><a href="../usuario/carteira.php"><i class="fa fa-money" aria-hidden="true"></i> R$:<?=$usuario->carteira?></a></li>
							<li><a href="../usuario/deslogar.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Sair</a></li>
						</ul>
					</ul>



				<?php
				}
				else if(Eh_Admin()){
				?>
					<ul class="right">
						<li>
							<form action="../utils/acha_pesquisa.php" method="post">
								<div class="input-field">
									<i class="white-text material-icons prefix">search</i>
									<input type="text" placeholder="Buscar" id="autocomplete-input" class="autocomplete white-text" name="procurar">
								</div>
							</form>
						</li>
						<li><a href="../admin/historico_doacao_aprovada.php">Histórico</a></li>
						<li><a href="../usuario/deslogar.php"><span class="glyphicon glyphicon-log-in"></span> Sair</a></li>
					</ul>

				<?php
				}   
				else{
					$link = $_SERVER["PHP_SELF"];
					$vetorEndereco = explode('/', $link);
					$novoEndereco = "";
					for($i = 2; $i < count($vetorEndereco); $i++) {
						$novoEndereco .= "/" . $vetorEndereco[$i];
					}
					$termo = "login.php";
					$pattern = '/'.$termo.'/';
					$temp = '/usuario/cadastro.php';
					
					$link = strtolower($novoEndereco);
					$temp = strtolower($temp);
					if(!preg_match($pattern,$link) && $link!=$temp){
						$redirect = "../usuario/login.php";
						header("location:$redirect");
					}			
				}
				?>
		</div>
	</div>
</nav>

<?php
$logado = IsLogado("../usuario/users.json");        
if($logado){
    $usuario = $_SESSION['user'];
?>
    <nav class="hide-on-large-only default-primary-color">
		<div class="nav-wrapper">
			<a class="brand-logo center" href="../index.php"><i class="fa fa-handshake-o" aria-hidden="true"></i></a>
			
			<div>
				<ul id="slide-out" class="side-nav">        
					<li>
						<form action="../utils/acha_pesquisa.php" method="post">
							<div class="input-field">
								<i class="black-text material-icons prefix">search</i>
								<input type="text" placeholder="Buscar" id="autocomplete-input" class="autocomplete white-text" name="procurar">
							</div>
						</form>
					</li>
					<li><a href="../usuario/pedido.php">Fazer Proposta</a></li>
					<li><a href="../usuario/historico_doacao.php">Histórico</a></li>
					<li><a><i class="fa fa-user" aria-hidden="true"></i> <?=$usuario->nome?></a></li>
					<li><a href="../usuario/carteira.php"><i class="fa fa-money" aria-hidden="true"></i> R$:<?=$usuario->carteira?></a></li>
					<li><a href="../usuario/deslogar.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Sair</a></li>
				</ul>

				<a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a>
			</div>
		</div>
    </nav>
    <script type="text/javascript">$(".button-collapse").sideNav();</script>
<?php
}
else if(Eh_Admin()){
?>
    <nav class="hide-on-large-only default-primary-color">
		<div class="nav-wrapper">
			<a class="brand-logo center" href="../index.php"><i class="fa fa-handshake-o" aria-hidden="true"></i></a>
			
			<div>
				<ul id="slide-out" class="side-nav show-on-small">
					<li>
						<form action="utils/acha_pesquisa.php" method="post">
							<div class="input-field">
								<i class="black-text material-icons prefix">search</i>
								<input type="text" placeholder="Buscar" id="autocomplete-input" class="autocomplete black-text" name="procurar">
							</div>
						</form>
					</li>
					<li><a href="../admin/historico_doacao_aprovada.php">Histórico de Doações Aprovadas</a></li>
					<li><a href="../usuario/deslogar.php"><span class="glyphicon glyphicon-log-in"></span> Sair</a></li>
				</ul>

				<a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a>
			</div>
		</div>
    </nav>
    <script type="text/javascript">$(".button-collapse").sideNav();</script>
<?php
}
else{
?>
	<nav class="default-primary-color hide-on-large-only">
		<div class="nav-wrapper">
			<a class="brand-logo center" href="../index.php"><i class="fa fa-handshake-o" aria-hidden="true"></i></a>
		</div>
	</nav>
<?php
}
?>