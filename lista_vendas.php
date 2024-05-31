<?php 
    require_once('verificar_login.php');
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
                    <?php 
                        require('conexao.php');
                        $lista = [];
                        $sql = "SELECT ven.id, cli.nome_cliente, pro.nome_produto, ven.quantidade, ven.total, ven.data FROM vendas ven 
                                INNER JOIN clientes cli ON cli.id = ven.cliente_id INNER JOIN produtos pro ON pro.id = ven.produto_id";
                        $statement = $conexaoComBanco -> query($sql); 
                        $contador = 1;
                    
                        if($statement -> rowCount() > 0) {
                            $lista = $statement -> fetchAll(PDO::FETCH_NUM);
                            
                            foreach($lista as $venda) { 
                                $numeroPar = $contador %2; 
                                // $valorFormatoBrasil = number_format($venda[4], ',', '.');
                                $dataDoBrasil = date('d/m/Y', strtotime($venda[5]));
                                if($numeroPar === 0) {
                                    echo "<tr>";
                                    echo "<td>$venda[0]</td>"; // id
                                    echo "<td>$venda[1]</td>"; // nome do cliente
                                    echo "<td>$venda[2]</td>"; // nome do produto
                                    echo "<td>$venda[3]</td>"; // quantidade
                                    echo "<td>$venda[4]</td>"; // total
                                    echo "<td>$dataDoBrasil</td>"; // data
                                    echo "<td><a href=edicao_venda.php?id=$venda[0]>Editar</a></td>";
                                    echo "<td><a href=excluir_venda.php?id=$venda[0]>Excluir</a></td>";
                                    echo "</tr>";
                                } else {
                                    echo "<tr class=cor-diferente>";
                                    echo "<td>$venda[0]</td>";
                                    echo "<td>$venda[1]</td>";
                                    echo "<td>$venda[2]</td>";
                                    echo "<td>$venda[3]</td>";
                                    echo "<td>$venda[4]</td>";
                                    echo "<td>$dataDoBrasil</td>";
                                    echo "<td><a href=edicao_venda.php?id=$venda[0]>Editar</a></td>";
                                    echo "<td><a href=excluir_venda.php?id=$venda[0]>Excluir</a></td>";
                                    echo "</tr>";
                                }
                                $contador++;
                            }  
                        }
                    ?> 

                </tbody>
            </table>
        </div>    
    </main>
    
</body>
</html>