<?php
    //Criar conexao com Mysql
    include('conexaoMysql.php');

    //pegar o ID do usuario
    $usuarioID = $_SESSION["ID"];

    //Pegar os meus produtos
    $sql = "SELECT ID, Nome, Descricao, Preco FROM produtos WHERE UsuarioID = '$usuarioID' ORDER BY DataHora DESC";

    //Mostrar os produtos cadastrados no DB
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        //Mostrar cada produto com o href para ver os detalhes do produto
        while($row = $result->fetch_assoc()) {

            //Pegar a foto principal
            $sqlImagem = "SELECT imagem, tipo FROM fotos WHERE numDaFoto = 1 AND ProdutoID =".$row['ID'];
            $resultImagem = $conn->query($sqlImagem);
            $rowImagem = $resultImagem->fetch_array();
            //Se nao houver foto, mostrar a padrao
            if($rowImagem['imagem'] == NULL) {
                $rowImagem['tipo'] = 'image/png';
                $rowImagem['imagem'] = '../res/imagemdefault.png';
                $escolherImagem = $rowImagem['imagem'];
            }
            //Se houver foto principal, entao mostrar
            else {
                $escolherImagem = 'data:'.$rowImagem['tipo'].';base64,'.base64_encode( $rowImagem['imagem']);
            }
            //Mostrar produto
            echo "
                <div class='col-lg-4 col-md-6 mb-4'>
                    <div class='card h-100'>
                        <a href='detalhesProduto.php?produto=".$row['ID']."'><img class='card-img-top' src='$escolherImagem' alt=''></a>
                        <div class='card-body'>
                            <h4 class='card-title'>
                                <a href='detalhesProduto.php?produto=".$row['ID']."'>".$row["Nome"]."</a>
                            </h4>
                            <h5>$".$row["Preco"]."</h5>
                            <p class='card-text'>".$row["Descricao"]."</p>
                        </div>
                    </div>
                </div>
            ";
        }
    } else {
        echo "<h1>Não há produtos cadastrados por você.</h1>";
    }

    //Encerra a conexao com o DB
    $conn->close();
?>