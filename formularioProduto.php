<?php 
    include "conexao.php";

    if(isset($_POST["btn_salvarProduto"])) {
        $nomeProduto = $_POST["campo_nomeProduto"]; 
        $valorDoProduto = str_replace(",", ".", $_POST["campo_valor"]); 
    
        $sqlProduto = "INSERT INTO produtos (nome_produto, valor) VALUES ('$nomeProduto', $valorDoProduto)";
        $resultadoProduto = mysqli_query($conexao, $sqlProduto);
        $linhasProdutos = mysqli_affected_rows($conexao);
    
        if($linhasProdutos == 1) {
            echo "Produto salvo com sucesso!<br/>";
    
        } else {
            echo "Erro ao salvar o produto<br/>";
        }

    }

    mysqli_close($conexao);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta http-equiv="Content-Type" content="text/html">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="assests/images/home.ico">
    <title>Novo Produto</title>
</head>
<body>

    <h1>Cadastro Produto</h1>

    <form name="CadastroProduto" method="post" action="formularioProduto.php">
        <label for="">Nome Produto: </label><br>
        <input type="text" name="campo_nomeProduto"><br><br>
        
        <label for="">Valor: </label><br>
        <input type="text" name="campo_valor"><br><br>  

        <input type="submit" name="btn_salvarProduto" value="Salvar">
        <input type="reset" name="btn_limparProduto" value="Limpar">
    </form>

    <div>
        <br>
        <a href="listaProdutos.php">Voltar</a>
    </div>
    
</body>
</html>