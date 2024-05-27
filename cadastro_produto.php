<?php 
    require_once('verificarLogin.php');
    require('conexao.php');

    if(isset($_POST['btn_salvarProduto'])) {

        $nomeProduto = filter_input(INPUT_POST, 'txt_nomeProduto');
        $valor = filter_input(INPUT_POST, 'txt_valor');
    
        if($nomeProduto && $valor) {
            $sql = "INSERT INTO produtos (nome_produto, valor) VALUES (:nome, :valor)";
            $statement = $conexaoComBanco->prepare($sql);
            $statement -> bindValue(':nome', $nomeProduto);
            $statement -> bindValue(':valor', $valor);
            $statement -> execute();

            // Voltar para a página a lista
            header("Location: lista_produtos.php");
            exit; // para sair do IF
     
        } else {
            echo "Erro ao tentar cadastar novo produto";
            exit;
        }
    }

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta http-equiv="Content-Type" content="text/html">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="assests/images/home.ico">
    <link rel="stylesheet" href="src/styles/cadastro_style.css">
    <title>Novo Produto</title>
</head>
<body>

    <h1>Cadastro Produto</h1>

    <form name="CadastroProduto" method="post" action="#">
        <label for="">Nome Produto: </label><br>
        <input type="text" name="txt_nomeProduto"><br><br>
        
        <label for="">Valor: </label><br>
        <input type="text" name="txt_valor"><br><br>  

        <input type="submit" name="btn_salvarProduto" value="Salvar">
        <input type="reset" name="btn_limparProduto" value="Limpar">
    </form>

    <div>
        <br>
        <a href="lista_produtos.php">Voltar</a>
    </div>
    
</body>
</html>