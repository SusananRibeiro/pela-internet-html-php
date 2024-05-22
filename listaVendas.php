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
                        echo "<tr>";
                        echo "<td>$idVenda</td><td>$nomeCliente</td><td>$nomeProduto</td><td>$quantidade</td><td>$total</td><td>$dataBrasil</td>";
                        echo "</tr>";
                    }

                    // Fechar a conexão com o bando
                    mysqli_close($conexao);
                    ?>
                    <!-- <tr class="cor-diferente">
                        <td>2</td>
                        <td>Maria Lopes</td>
                        <td>Boné branco sem estampa</td>
                        <td>1</td>
                        <td>40,00</td>
                        <td>01/03/24</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Jarbas da Silva</td>
                        <td>Boné branco sem estampa</td>
                        <td>2</td>
                        <td>80,00</td>
                        <td>08/03/24</td>
                    </tr>
                    <tr class="cor-diferente">
                        <td>4</td>
                        <td>Jarbas da Silva</td>
                        <td>Caneca branca sem estampa</td>
                        <td>1</td>
                        <td>20,00</td>
                        <td>08/03/24</td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>José Nunes</td>
                        <td>Camiseta preta sem estampa</td>
                        <td>3</td>
                        <td>150,00</td>
                        <td>09/03/24</td>
                    </tr> -->
                </tbody>
            </table>
        </div>    
    </main>
    
</body>
</html>