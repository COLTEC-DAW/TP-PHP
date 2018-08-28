<?php
    //Se o usuario tentar fazer login (para saber se ele nao abriu pagina por um link)
	if(isset($_POST['login'])){
        
        //Iniciar a sessao
		session_start();
        
        //Criar conexao com Mysql
        include('conexaoMysql.php');
 
        //Pegar o email e a senha (enviado pelo formulario ../paginas/login.php)
        //htmlspecialchars - remover os caracteres especiais para evitar o code injection
		$email = htmlspecialchars($_POST['email']);
		$senha = htmlspecialchars($_POST['senha']);
 
        //Pegar os dados do usuario no banco de dados
        $sql = "select * from usuario where Email='$email' && Senha='$senha'";
        $result = $conn->query($sql);
 
        //Se nao achar o usuario no banco de dados
		if ($result->num_rows == 0){
            //Retorna para tela de login, mas com aviso de erro
            header('location:../paginas/login.php?status=incorreto');
		}
		else{
            $row = $result->fetch_array();
 
            //Se o usuario pediu para lembrar a senha
			if (isset($_POST['lembrarSenha'])){
                //Seta o cookie (86400 eh 1 dia)
                //Total: cookie disponivel por 30 dias
                setcookie("email", $row['Email'], time() + (86400 * 30), '/');
                setcookie("senha", $row['Senha'], time() + (86400 * 30), '/');
			}
            //Pegar o ID do usuario e o status de admin (1 eh admin) (0 nao eh admin)
            $_SESSION['ID']=$row['ID'];
            $_SESSION['Admin']=$row['Admin'];
			header('location:../paginas/meusProdutos.php');
		}
    }
    
    //Se o usuario tiver aberto a pagina por um link, sem logar, entao retornar para a pagina principal
	else{
		header('location:../index.php');
	}
?>