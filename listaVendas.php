<?php 
    include('verificarLogin.php');
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
                    </tr>
                </thead>
                <tbody>
                <?php
                    include "conexao.php";                   

                    $sql = "SELECT ven.id, cli.nome_cliente, pro.nome_produto, ven.quantidade, ven.total, ven.data FROM vendas ven INNER JOIN clientes cli ON cli.id = ven.cliente_id INNER JOIN produtos pro ON pro.id = ven.produto_id";
                    $resultado = mysqli_query($conexao, $sql);
                
                    while($registro = mysqli_fetch_row($resultado)) {
                        $idVenda = $registro[0];
                        $nomeCliente = $registro[1];
                        $nomeProduto = $registro[2];
                        $quantidade = $registro[3];
                        $total = $registro[4];
                        $dataVenda = $registro[5];
                        $dataBrasil = implode("/",array_reverse(explode("-", $dataVenda))); 
                        $numeroParVendas = $idVenda % 2;

                        if($numeroParVendas != 0) {
                            echo "<tr class=cor-diferente>";
                            echo "<td>$idVenda</td><td>$nomeCliente</td><td>$nomeProduto</td><td>$quantidade</td><td>$total</td><td>$dataBrasil</td>";
                            echo "</tr>";
                        } else {
                            echo "<tr>";
                            echo "<td>$idVenda</td><td>$nomeCliente</td><td>$nomeProduto</td><td>$quantidade</td><td>$total</td><td>$dataBrasil</td>";
                            echo "</tr>";
                        }

                    }

                    // Fechar a conexão com o bando
                    mysqli_close($conexao);
                    ?>
                </tbody>
            </table>
        </div>    
    </main>
    
</body>
</html>