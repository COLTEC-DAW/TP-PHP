<nav class="navbar default-primary-color">
    <div class="container center-align">
        <a class="brand-logo" href="../index.php"><i class="fa fa-handshake-o" aria-hidden="true"></i></a>
        <?php
        $logado = IsLogado("../usuario/users.json");
            if($logado){
                $usuario = $_SESSION['user'];
            ?>
                <ul class="right">
                    <li><a href="../usuario/pedido.php">Fazer Pedido</a></li>
                    <li><a href="../usuario/historico_doacao.php">Histórico de Doações</a></li>
                    <li><a><i class="fa fa-user" aria-hidden="true"></i> <?=$usuario->nome?></a></li>
                    <li><a href="../usuario/carteira.php"><i class="fa fa-money" aria-hidden="true"></i> R$:<?=$usuario->carteira?></a></li>
                    <li><a href="../usuario/deslogar.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Sair</a></li>
                </ul>
            <?php
            }
            else if(Eh_Admin()){
            ?>
                <ul class="right">
                    <li><a href="../admin/historico_doacao_aprovada.php">Histórico de Doações Aprovadas</a></li>
                    <li><a href="../usuario/deslogar.php"><span class="glyphicon glyphicon-log-in"></span> Sair</a></li>
                </ul>

            <?php
            }   
            else{
            ?>
                <ul class="right">
                    <li><a href="../usuario/cadastro.php"><i class="fa fa-user-plus" aria-hidden="true"></i> Cadastrar</a></li>
                    <li><a href="../usuario/login.php"><i class="fa fa-sign-in" aria-hidden="true"></i> Entrar</a></li>
                </ul>
            <?php
            }
            ?>
    </div>
</nav>