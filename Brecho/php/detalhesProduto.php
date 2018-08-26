<?php
    function mostrarDados($qualDado) {
        //Criar conexao com Mysql
        include('conexaoMysql.php');
        //Pegar o id do produto enviado por get no arquivo produtos.php
        $idProduto = $_GET['produto'];

        //Selecionar os dados do produto de acordo com o id dele
        $sql = "SELECT $qualDado FROM produtos WHERE ID = '$idProduto'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $dadoProduto = $row["$qualDado"];
        echo "$dadoProduto";

        //Encerrar a conexao
        $conn->close();
    }
    function mostrarDadosVendedor($qualDado) {
        //Criar conexao com Mysql
        include('conexaoMysql.php');
        //Pegar o id do produto enviado por get no arquivo produtos.php
        $idProduto = $_GET['produto'];

        //Selecionar o ID do vendedor, com base no ID do produto
        $sql = "SELECT UsuarioID FROM produtos WHERE ID = '$idProduto'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $IDdoVendedor = $row["UsuarioID"];
        //Selecionar os dados do vendedor
        $sqlVendedor = "SELECT $qualDado FROM usuario WHERE ID = '$IDdoVendedor'";
        $resultVendedor = $conn->query($sqlVendedor);
        $rowVendedor = $resultVendedor->fetch_assoc();
        $DadoVendedor = $rowVendedor["$qualDado"];
        echo "$DadoVendedor";

        //Encerrar a conexao
        $conn->close();
    }

    //Selecionar as fotos do produto
    function mostrarFotos($numFoto) {
        //Criar conexao com Mysql
        include('conexaoMysql.php');

        //Pegar o id do produto enviado por get no arquivo produtos.php
        $idProduto = $_GET['produto'];

        $sqlFotos = "SELECT tipo, imagem FROM fotos WHERE numDaFoto = $numFoto AND ProdutoID = '$idProduto'";
        $resultFotos = $conn->query($sqlFotos);
        //Se houver fotos mostrar
        if ($resultFotos->num_rows > 0) {
            while($rowFotos = $resultFotos->fetch_assoc()) {
                echo 'data:'.$rowFotos['tipo'].';base64,'.base64_encode( $rowFotos['imagem'] ).'';
            }
        }
        //Senao houver fotos, mostrar uma padrao
        else {
            echo "../res/imagemdefault.png";
        }
        //Encerrar a conexao
        $conn->close();
    }

    //BOTOES EXCLUIR E EDITAR (ADMIN OU DONO DO PRODUTO)
    function escluirEditar() {
        //Criar conexao com Mysql
        include('conexaoMysql.php');

        //Pegar o id do produto
        $idProduto = $_GET['produto'];
        //Selecionar o ID do usuario que criou o produto
        $sql = "SELECT UsuarioID FROM produtos WHERE ID = '$idProduto'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();

        //Verifica se o usuario esta logado
        if (isset($_SESSION['ID'])) {
            //Verificar se o usuario eh o dono do produto (ele que criou) para poder editar/deletar OU se o usuario eh admin, pois admin pode deletar o produto de todo mundo
            if ($_SESSION['ID'] == $row["UsuarioID"] || $_SESSION['Admin'] == 1) {
                //Botao excluir produto
                echo '
                    <form method="POST" action="../php/excluirProduto.php?produto='.$idProduto.'">
                        <input type="hidden" name="name" value="">
                        <input type="submit" name="submit" value="Deletar">
                    </form>
                ';
                
                //Botao editar produto
                echo '
                    <!-- enviar o id do produto para saber qual produto deve ser editado -->
                    <form method="POST" action="paginaEditarProduto.php?produto='.$idProduto.'">
                        <input type="hidden" name="name" value="">
                        <br><input type="submit" name="submit" value="Editar">
                    </form>
                ';
            }
        }
        //Encerrar a conexao
        $conn->close();
    }
?>