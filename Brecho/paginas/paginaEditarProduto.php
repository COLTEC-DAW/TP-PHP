<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <!-- formulario para editar os dados do produto -->
    <!-- Obs: funcao php que pega a informacao de cada campo esta no final deste arquivo -->
    <form action="../php/editarProduto.php">
        Nome do produto: <input type="text" name="Nome" value="<?php pegarInformacaoAntesEditar("Nome") ?>"><br>
        Preco: <input type="text" name="Preco" value="<?php pegarInformacaoAntesEditar("Preco") ?>"><br>
        Foto: <input type="text" name="Foto" value="<?php pegarInformacaoAntesEditar("Foto") ?>"><br>
        Categoria:      <select name="Categoria">
                            <option disabled selected value>Nenhuma</option>
                            <option value="aulas">Aulas particulares</option>
                            <option value="comidas">Comidas</option>
                            <option value="eletronicos">Eletrônicos</option>
                            <option value="materiais">Material Escolar</option>
                            <option value="outros">Outros</option>
                        </select><br>
        <!-- Enviar o ID do produto tambem mas nao mostrar (display:none) -->
        <input style="display:none;" type="text" name="produto" value="<?php pegarInformacaoAntesEditar("ID") ?>"><br>
        <!-- Enviar formulario para editar -->
        <input type="submit" value="Editar">
    </form>
</body>
</html>

<?php
    function pegarInformacaoAntesEditar($nomeColuna) {
        include('../php/conexaoMysql.php');
        $idProduto = $_GET['produto'];
        $sql = "SELECT $nomeColuna FROM produtos WHERE ID = '$idProduto'";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()) {
            echo $row["$nomeColuna"];
        }
        $conn->close();
    }
?>