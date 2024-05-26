<?php 
    include('verificarLogin.php');

    require "conexao.php";
    
    $lista = [];
    $sql = $pdo -> query("SELECT ven.id, cli.nome_cliente, pro.nome_produto, ven.quantidade, ven.total, ven.data 
    FROM vendas ven INNER JOIN clientes cli ON cli.id = ven.cliente_id INNER JOIN produtos pro ON pro.id = ven.produto_id"); 
    // Valida sem tem registro no banco de dados
    if($sql -> rowCount() > 0) {
        $lista = $sql -> fetchAll(PDO::FETCH_ASSOC);
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="src/assest/images/venda.ico">
    <link rel="stylesheet" href="src/styles/config.css">
    <title>Lista de Vendas</title>
</head>
<body>
    <main class="container">
        <h1>Lista de Vendas</h1>    
        <div class="container-table">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Cliente</th>
                        <th>Produto</th>
                        <th>Quantidade</th>
                        <th>Total</th>
                        <th>Data</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($lista as $venda): ?>
                        <tr>
                            <td><?= $venda['id']; ?></td>
                            <td><?= $venda['nome_cliente']; ?></td>
                            <td><?= $venda['nome_produto']; ?></td>
                            <td><?= $venda['quantidade']; ?></td>
                            <td><?= $venda['total']; ?></td>
                            <td><?= $venda['data']; ?></td>
                            <td><a href="edicao_venda.php?id=<?= $venda['id']; ?>">Editar</a></td>
                            <td><a href="excluir_venda.php?id=<?= $venda['id']; ?>">Excluir</a></td>                               
                        </tr>
                    <?php endforeach; ?>  
                </tbody>
            </table>
        </div>    
    </main>
    
</body>
</html>