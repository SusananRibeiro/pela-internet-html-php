<?php 
    include('verificarLogin.php');
    require "conexao.php";


    // GET
    $dadosCliente = [];
    $id = filter_input(INPUT_GET, 'id'); // "'id'" é o nome da variável da URL

    if($id) {
        $sql = $pdo -> prepare("SELECT * FROM clientes WHERE id = :id");
        $sql -> bindValue(':id', $id);
        $sql -> execute();

        if($sql -> rowCount() > 0) {
            $dadosCliente = $sql -> fetch(PDO::FETCH_ASSOC); // "fetch()" para mapiar as informações separadamente
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

            $sql = $pdo -> prepare("UPDATE clientes SET nome_cliente = :nome, telefone = :telefone, cep = :cep WHERE id = :id");
            $sql -> bindValue(':nome', $nome);
            $sql -> bindValue(':telefone', $telefone);
            $sql -> bindValue(':cep', $cep);
            $sql -> bindValue(':id', $id);
            $sql -> execute();

            header("Location: lista_clientes.php");
            // echo "Cliente atualizado com sucesso!<br/>";
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
            <input type="text" name="txt_id" value="<?= $dadosCliente['id'];?>"/> <!-- disabled  -->

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
        <br>
        <a href="lista_clientes.php">Voltar</a>
    </div>
</body>
</html>