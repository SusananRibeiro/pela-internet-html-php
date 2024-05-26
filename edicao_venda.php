<?php 
    include('verificarLogin.php');
    require "conexao.php";

    // GET
    $dadosVenda = [];
    $id = filter_input(INPUT_GET, 'id'); // "'id'" é o nome da variável da URL

    if($id) {
        $sql = $conexaoComBanco -> prepare("SELECT ven.id, cli.nome_cliente, pro.nome_produto, ven.quantidade, ven.total, ven.data 
        FROM vendas ven INNER JOIN clientes cli ON cli.id = ven.cliente_id INNER JOIN produtos pro ON pro.id = ven.produto_id WHERE ven.id = :id"); 
        $sql -> bindValue(':id', $id);
        $sql -> execute();

        if($sql -> rowCount() > 0) {
            $dadosVenda = $sql -> fetch(PDO::FETCH_ASSOC); // "fetch()" para mapiar as informações separadamente
        } else  {
            header('Location: index.php');
            exit;
        }
    } else {
        echo "ID inválido";
    }

    // POST 
    if(isset($_POST['btn_Atualizar'])) {
        $dadosVenda = [];
        $id = filter_input(INPUT_POST, 'txt_id'); 
        $cliente = filter_input(INPUT_POST, 'txt_cliente');
        $produto = filter_input(INPUT_POST, 'txt_produto');
        $quantidade = filter_input(INPUT_POST, 'txt_quantidade');
        $total = filter_input(INPUT_POST, 'txt_total');
        $data = filter_input(INPUT_POST, 'txt_data');

        if($id && $cliente && $produto && $quantidade && $total && $data) {

            $sql = $conexaoComBanco -> prepare("UPDATE vendas SET quantidade = :quantidade, total = :total, data = :data WHERE id = :id");
            $sql -> bindValue(':quantidade', $quantidade);
            $sql -> bindValue(':total', $total);
            $sql -> bindValue(':data', $data);
            $sql -> bindValue(':id', $id);
            $sql -> execute();

            header("Location: lista_vendas.php");
            // echo "Venda atualizado com sucesso!<br/>";
            exit;

        } else {
            echo "Erro ao atualizar venda!<br/>";
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

    <h1>Editar Venda</h1>
    <div class="conteudo">
        <form name="CadastroVenda" method="post" action="#">
            <label for="">ID:</label>
            <input type="text" name="txt_id" value="<?= $dadosVenda['id'];?>" readonly/>

            <label for="">Cliente:</label>
            <input type="text" name="txt_cliente" value="<?= $dadosVenda['nome_cliente'];?>" readonly/>

            <label>Produto: </label>
            <input type="text" name="txt_produto"  value="<?= $dadosVenda['nome_produto'];?>" readonly/>

            <label>Quantidade: </label>
            <input type="text" name="txt_quantidade"  value="<?= $dadosVenda['quantidade'];?>" />

            <label>Total: </label>
            <input type="text" name="txt_total"  value="<?= $dadosVenda['total'];?>" />

            <label>Data: </label>
            <input type="text" name="txt_data"  value="<?= $dadosVenda['data'];?>" />

            <input type="submit" name="btn_Atualizar" value="Atualizar" />
        </form>
    </div>
    <div>
        <a href="lista_vendas.php">Voltar</a>
    </div>
</body>
</html>