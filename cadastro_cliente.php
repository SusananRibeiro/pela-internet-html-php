<?php 
    require_once('verificar_login.php');
    require('conexao.php');

    if(isset($_POST['btn_salvarCliente'])) {
        $nomeCliente = filter_input(INPUT_POST, 'txt_nomeCliente');
        $telefone = filter_input(INPUT_POST, 'txt_telefone');
        $cep = filter_input(INPUT_POST, 'txt_cep');
    
        if(empty($nomeCliente)) {
            echo "<div class=erro>Nome do cliente é obrigatório</div>";
        } else if(empty($telefone)) {
            echo "<div class=erro>Telefone do cliente é obrigatório</div>";
        } else if(empty($cep)) {
            echo "<div class=erro>CEP do cliente é obrigatório</div>";
        } else if($nomeCliente && $telefone && $cep) {
            // Ver se tem algum nome cadastrado primeiro fazer essa validação
            $sql = "SELECT * FROM clientes WHERE nome_cliente = :nome";
            $statement = $conexaoComBanco -> prepare($sql);
            $statement -> bindValue(':nome', $nomeCliente);
            $statement -> execute();
    
            // Ver se tem algum e-mail cadastrado
            if($statement-> rowCount() === 0) {
                $sql = "INSERT INTO clientes (nome_cliente, telefone, cep) VALUES (:nome, :telefone, :cep)";
                $statement = $conexaoComBanco->prepare($sql);
                $statement -> bindValue(':nome', $nomeCliente);
                $statement -> bindValue(':telefone', $telefone);
                $statement -> bindValue(':cep', $cep);
                $statement -> execute();
    
                // Voltar para a página a lista
                header("Location: lista_clientes.php");
                exit; // para sair do IF
    
            } else {
                echo "<div class=erro>Nome do cliente já cadastrado.</div>";
            }
     
        } else {
            echo "<div class=erro>Erro ao tentar cadastar cliente.</div>";
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
            <div>
                <label for="">Nome Cliente: </label><br>
                <input type="text" name="txt_nomeCliente">
            </div>
            <div>
                <label for="">Telefone: </label><br>
                <input type="text" name="txt_telefone">
            </div>
            <div>
                <label for="">CEP: </label><br>
                <input type="number" name="txt_cep">
            </div>
            <div>
                <input type="submit" name="btn_salvarCliente" value="Salvar">
                <input type="reset" name="btn_limparCliente" value="Limpar">
            </div>
        </form>
    </div>
    <div>
        <a href="lista_clientes.php">Voltar</a>
    </div>
</body>
</html>
