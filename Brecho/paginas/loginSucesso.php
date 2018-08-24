<?php
    //Iniciar a sessao
	session_start();
 
    //Se o usuario nao estiver logado
	if (!isset($_SESSION['ID']) ||(trim ($_SESSION['ID']) == '')) {
        //Mandar ele para a pagina principal
        header('location:../index.php');
		exit();
	}
    
    //Criar conexao com Mysql
    include('../php/conexaoMysql.php');

    //Pegar as informacoes do usuario
    $sql = "select * from usuario where ID='".$_SESSION['ID']."'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    
    //Encerrar a conexao
    $conn->close();
?>
<!DOCTYPE html>
<html>
<head>
<title>Login feito com sucesso</title>
</head>
<body>
    <h2>Login feito com sucesso <?php echo $row['Nome'];?>!</h2>
    <h2>O que você deseja fazer?</h2>
    <a href="cadastrarProdutos.php">Anunciar meu produto</a><br>
    <a href="../index.php">Ir para a página inicial</a>
</body>
</html>