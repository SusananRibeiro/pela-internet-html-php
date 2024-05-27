<?php 
    require_once('verificarLogin.php');
    require('conexao.php');

    // GET
    $dadosCliente = [];
    $id = filter_input(INPUT_GET, 'id'); // "'id'" é o nome da variável da URL

    if($id) {
        $sql = "SELECT * FROM clientes WHERE id = :id";
        $statement = $conexaoComBanco -> prepare($sql);
        $statement -> bindValue(':id', $id);
        $statement -> execute();

        if($statement -> rowCount() > 0) {
            $dadosCliente = $statement -> fetch(PDO::FETCH_ASSOC); // "fetch()" para mapiar as informações separadamente
        } else  {
            header('Location: index.php');
            exit;
        }
    } else {
        echo "ID inválido";
    }

    // POST 
    if(isset($_POST['btn_Atualizar'])) {
        $dadosCliente = [];
        $id = filter_input(INPUT_POST, 'txt_id'); 
        $nome = filter_input(INPUT_POST, 'txt_nome');
        $telefone = filter_input(INPUT_POST, 'txt_telefone');
        $cep = filter_input(INPUT_POST, 'txt_cep');

        if($id && $nome && $telefone && $cep) {
            $sql = "UPDATE clientes SET nome_cliente = :nome, telefone = :telefone, cep = :cep WHERE id = :id";
            $statement = $conexaoComBanco -> prepare($sql);
            $statement -> bindValue(':nome', $nome);
            $statement -> bindValue(':telefone', $telefone);
            $statement -> bindValue(':cep', $cep);
            $statement -> bindValue(':id', $id);
            $statement-> execute();

            header("Location: lista_clientes.php");
            exit;

        } else {
            echo "Erro ao atualizar cliente!<br/>";
            exit;
        }
    }

?>
<head>
    <meta http-equiv="Content-Type" content="text/html">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="assests/images/home.ico">
    <link rel="stylesheet" href="src/styles/edicao_style.css">
</head>
<body>

    <h1>Editar Cliente</h1>
    <div class="conteudo">
        <form name="CadastroCliente" method="post" action="#">
            <label for="">ID:</label>
            <input type="text" name="txt_id" value="<?= $dadosCliente['id'];?>" readonly/> 

            <label for="">Nome do cliente:</label>
            <input type="text" name="txt_nome" value="<?= $dadosCliente['nome_cliente'];?>" />

            <label>Telefone: </label>
            <input type="text" name="txt_telefone"  value="<?= $dadosCliente['telefone'];?>" />

            <label>CEP: </label>
            <input type="text" name="txt_cep"  value="<?= $dadosCliente['cep'];?>" />

            <input type="submit" name="btn_Atualizar" value="Atualizar" />
        </form>
    </div>
    <div>
        <a href="lista_clientes.php">Voltar</a>
    </div>
</body>
</html>