<?php 
    include('verificarLogin.php');
    require "conexao.php";

    if(isset($_POST['btn_salvarCliente'])) {
        $nomeCliente = filter_input(INPUT_POST, 'txt_nomeCliente');
        $telefone = filter_input(INPUT_POST, 'txt_telefone');
        $cep = filter_input(INPUT_POST, 'txt_cep');
    
        if($nomeCliente && $telefone && $cep) {
            // Ver se tem algum nome cadastrado primeiro fazer essa validação
            $sql = $conexaoComBanco -> prepare("SELECT * FROM clientes WHERE nome_cliente = :nome");
            $sql -> bindValue(':nome', $nomeCliente);
            $sql -> execute();
    
            // Ver se tem algum e-mail cadastrado
            if($sql -> rowCount() === 0) {
                $sql = $conexaoComBanco->prepare("INSERT INTO clientes (nome_cliente, telefone, cep) VALUES (:nome, :telefone, :cep)");
                $sql -> bindValue(':nome', $nomeCliente);
                $sql -> bindValue(':telefone', $telefone);
                $sql -> bindValue(':cep', $cep);
                $sql -> execute();
    
                // Voltar para a página a lista
                header("Location: lista_clientes.php");
                exit; // para sair do IF
    
            } else {
                echo "Nome do cliente já existe";
            }
     
        } else {
            echo "Erro ao tentar cadastar cliente";
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
    <title>Novo Cliente</title>
</head>
<body>
    <h1>Cadastro cliente</h1>

    <div class="conteudo">
        <form name="CadastroCliente" method="post" action="cadastro_cliente.php">
            <label for="">Nome Cliente: </label><br>
            <input type="text" name="txt_nomeCliente">
            
            <label for="">Telefone: </label><br>
            <input type="text" name="txt_telefone">

            <label for="">CEP: </label><br>
            <input type="number" name="txt_cep">

            <input type="submit" name="btn_salvarCliente" value="Salvar">
            <input type="reset" name="btn_limparCliente" value="Limpar">
        </form>
    </div>
    <div>
        <a href="lista_clientes.php">Voltar</a>
    </div>
</body>
</html>
