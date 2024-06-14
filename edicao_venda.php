<?php 
    require_once('verificar_login.php');
    require('conexao.php');

    // GET
    $dadosVenda = [];
    $id = filter_input(INPUT_GET, 'id'); // "'id'" é o nome da variável da URL

    if($id) {
        $sql = "SELECT ven.id, cli.nome_cliente, pro.nome_produto, ven.quantidade, ven.total, ven.data FROM vendas ven 
                INNER JOIN clientes cli ON cli.id = ven.cliente_id INNER JOIN produtos pro ON pro.id = ven.produto_id WHERE ven.id = :id";
        $statement = $conexaoComBanco -> prepare($sql); 
        $statement -> bindValue(':id', $id);
        $statement -> execute();

        if($statement -> rowCount() > 0) {
            $dadosVenda = $statement -> fetch(PDO::FETCH_ASSOC); // "fetch()" para mapiar as informações separadamente
        } else  {
            header('Location: index.php');
            exit;
        }
    } else {
        echo "<div class=erro>ID inválido</div>";
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
        $dataNoFormatoDoBanco = date('Y-m-d', strtotime(str_replace('/', '-', $data)));

        if(empty($quantidade)) {
            echo "<div class=erro>Quantidade da venda é obrigatório</div>";
        } else if(empty($total)) {
            echo "<div class=erro>Total da venda é obrigatório</div>";
        } else if(empty($data)) {
            echo "<div class=erro>Data da venda é obrigatório</div>";
        } else if($id && $cliente && $produto && $quantidade && $total && $data) {
            $sql = "UPDATE vendas SET quantidade = :quantidade, total = :total, data = :data WHERE id = :id";
            $statement = $conexaoComBanco -> prepare($sql);
            $statement -> bindValue(':quantidade', $quantidade);
            $statement -> bindValue(':total', $total);
            $statement -> bindValue(':data', $dataNoFormatoDoBanco);
            $statement -> bindValue(':id', $id);
            $statement -> execute();

            header("Location: lista_vendas.php");
            // echo "Venda atualizado com sucesso!<br/>";
            exit;

        } else {
            echo "<div class=erro>Erro ao atualizar venda!</div>";
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
            <div>
                <label for="">ID:</label><br>
                <input type="text" name="txt_id" value="<?= $dadosVenda['id'];?>" readonly/>
            </div>
            <div>
                <label for="">Cliente:</label><br>
                <input type="text" name="txt_cliente" value="<?= $dadosVenda['nome_cliente'];?>" readonly/>
            </div>
            <div>
                <label>Produto: </label><br>
                <input type="text" name="txt_produto"  value="<?= $dadosVenda['nome_produto'];?>" readonly/>
            </div>
            <div>
                <label>Quantidade: </label><br>
                <input type="text" name="txt_quantidade"  value="<?= $dadosVenda['quantidade'];?>" />
            </div>

            <div>
                <label>Total: </label><br>
                <input type="text" name="txt_total"  value="<?= $dadosVenda['total'];?>" />
            </div>
            <div>
                <label>Data: </label><br>
                <input type="text" name="txt_data"  value="<?= $dadosVenda['data'];?>" />
            </div>
            <button type="submit" name="btn_Atualizar">Atualizar</button>
        </form>
    </div>
    <div>
        <a href="lista_vendas.php">Voltar</a>
    </div>
</body>
</html>