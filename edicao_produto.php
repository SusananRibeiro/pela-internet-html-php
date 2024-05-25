<?php 
    include "conexao.php";

    // if(isset($_POST["btn_salvarProduto"])) {
    //     $nomeProduto = $_POST["campo_nomeProduto"]; 
    //     $valorDoProduto = str_replace(",", ".", $_POST["campo_valor"]); 
    
    //     $sqlProduto = "INSERT INTO produtos (nome_produto, valor) VALUES ('$nomeProduto', $valorDoProduto)";
    //     $resultadoProduto = mysqli_query($conexao, $sqlProduto);
    //     $linhasProdutos = mysqli_affected_rows($conexao);
    
    //     if($linhasProdutos == 1) {
    //         echo "Produto salvo com sucesso!<br/>";
    
    //     } else {
    //         echo "Erro ao salvar o produto<br/>";
    //     }

    // }

    mysqli_close($conexao);
?>
<body>

    <h1>Editar Produto</h1>

    <form name="CadastroProduto" method="post" action="#">
        <label for="">Código: </label><br>
        <input type="text" name="campo_codigoProduto"><br><br>

        <label for="">Nome Produto: </label><br>
        <input type="text" name="campo_nomeProduto"><br><br>
        
        <label for="">Valor: </label><br>
        <input type="text" name="campo_valor"><br><br>  

        <input type="submit" name="btn_salvarProduto" value="Salvar">
    </form>

    <div>
        <br>
        <a href="lista_produtos.php">Voltar</a>
    </div>
    
</body>
</html>