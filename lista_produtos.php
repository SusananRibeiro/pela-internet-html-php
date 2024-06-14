<?php 
    require_once('verificar_login.php');

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="src/assest/images/produto.ico">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="src/styles/config.css">
    <title>Lista Produtos</title>
</head>
<body>
    <main class="container">
        <a href="cadastro_produto.php">Novo</a>
        <h1>Lista de Produtos</h1>
        <div class="container-table">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Valor</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        require('conexao.php');
                        
                        $lista = [];
                        $sql = "SELECT * FROM produtos";
                        $statement = $conexaoComBanco -> query($sql); 
                        $contador = 1;
                    
                        if($statement -> rowCount() > 0) {
                            $lista = $statement -> fetchAll(PDO::FETCH_NUM);
                            
                            foreach($lista as $produto) { 
                                $numeroPar = $contador %2; 
                                $valorFormatoDoBrasil = number_format($produto[2], 2, ',', '');

                                if($numeroPar === 0) {
                                    echo "<tr>";
                                    echo "<td>$produto[0]</td>";
                                    echo "<td>$produto[1]</td>";
                                    echo "<td>$valorFormatoDoBrasil</td>";
                                    echo "<td><a href=edicao_produto.php?id=$produto[0]>Editar</a></td>";
                                    echo "<td><a href=excluir_produto.php?id=$produto[0]>Excluir</a></td>";
                                    echo "</tr>";
                                } else {
                                    echo "<tr class=cor-diferente>";
                                    echo "<td>$produto[0]</td>";
                                    echo "<td>$produto[1]</td>";
                                    echo "<td>$valorFormatoDoBrasil</td>";
                                    echo "<td><a href=edicao_produto.php?id=$produto[0]>Editar</a></td>";
                                    echo "<td><a href=excluir_produto.php?id=$produto[0]>Excluir</a></td>";
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
    <script src="src/scripts/config_script.js"></script>
    <script>

        $("#imagem-jq").mouseover(function(){
            const imagem =  $(this);
            imagem.children().addClass("imagem");
        });

        $("#imagem-jq").mouseout(function(){
            const imagem =  $(this);
            imagem.children().removeClass("imagem");
        });

    </script>
</body>
</html>