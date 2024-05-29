<?php 
    require_once('verificar_login.php');
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
        $nomeCliente = filter_input(INPUT_POST, 'txt_nome');
        $telefone = filter_input(INPUT_POST, 'txt_telefone');
        $cep = filter_input(INPUT_POST, 'txt_cep');

        if(empty($nomeCliente)) {
            echo "<div class=erro>Nome do cliente é obrigatório</div>";
        } else if(empty($telefone)) {
            echo "<div class=erro>Telefone do cliente é obrigatório</div>";
        } else if(empty($cep)) {
            echo "<div class=erro>CEP do cliente é obrigatório</div>";
        } else if($id && $nomeCliente && $telefone && $cep) {
            $sql = "UPDATE clientes SET nome_cliente = :nome, telefone = :telefone, cep = :cep WHERE id = :id";
            $statement = $conexaoComBanco -> prepare($sql);
            $statement -> bindValue(':nome', $nomeCliente);
            $statement -> bindValue(':telefone', $telefone);
            $statement -> bindValue(':cep', $cep);
            $statement -> bindValue(':id', $id);
            $statement-> execute();

            header("Location: cadastro_cliente.php");
            exit;

        } else {
            echo "<div class=erro>Erro ao atualizar cliente!</div>";
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
            <div>
                <label for="">ID:</label><br>
                <input type="text" name="txt_id" value="<?= $dadosCliente['id'];?>" readonly/> 
            </div>
            <div>
                <label for="">Nome do cliente:</label><br>
                <input type="text" name="txt_nome" value="<?= $dadosCliente['nome_cliente'];?>" />
            </div>
            <div>
                <label>Telefone: </label><br>
                <input type="text" name="txt_telefone"  value="<?= $dadosCliente['telefone'];?>" />
            </div>
            <div>
                <label>CEP: </label><br>
                <input type="text" name="txt_cep"  value="<?= $dadosCliente['cep'];?>" />
            </div>
            <input type="submit" name="btn_Atualizar" value="Atualizar" />
        </form>
    </div>
    <div>
        <a href="lista_clientes.php">Voltar</a>
    </div>
</body>
</html>