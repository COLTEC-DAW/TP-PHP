<?php
    //Criar conexao com Mysql
    include('conexaoMysql.php');

    //Verificar se categoria eh diferente de NULL
    if (isset($_GET['categoria'])){
        //Pegar qual a categoria do produto
        $categoria = $_GET['categoria'];
        //Selecionar os dados dos produtos de uma determinada categoria
        $sql = "SELECT Nome, Preco, Foto FROM produtos WHERE Categoria = '$categoria'";
    }
    //Se nao ha nenhuma categoria, a variavel categoria recebe um texto vazio
    else{
        $categoria = '';
        //Selecionar os dados de todos os produtos em ordem da data cadastrada - mais recentes
        $sql = "SELECT Nome, Preco, Foto FROM produtos";
    }
    //Mostrar os produtos cadastrados no DB
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        //Mostrar cada linha
        while($row = $result->fetch_assoc()) {
            echo "<div class='listarProdutos'> Nome: " . $row["Nome"]. " - Preco: " . $row["Preco"]. " - Foto: " . $row["Foto"]. "</div>";
        }
    } else {
        echo "Não há produtos cadastrados.";
    }

    //Encerra a conexao com o DB
    $conn->close();
?>