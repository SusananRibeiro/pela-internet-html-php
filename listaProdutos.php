<?php 
    include('verificarLogin.php');
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
        <a href="formularioProduto.php">Novo</a>
        <h1>Lista de Produtos</h1>
        <div class="container-table">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Valor</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        include "conexao.php";

                        $sql = "SELECT * FROM produtos";
                        $resultado = mysqli_query($conexao, $sql);
                    
                        while($registro = mysqli_fetch_row($resultado)) {
                            $idProduto = $registro[0];
                            $nomeProduto = $registro[1];
                            $valorProduto = $registro[2];
                            $numeroParProduto = $idProduto % 2;

                            if($numeroParProduto != 0) {
                                echo "<tr class=cor-diferente>";
                                echo "<td>$idProduto</td><td>$nomeProduto</td><td>$valorProduto</td>";
                                echo "</tr>";
                            } else {
                                echo "<tr>";
                                echo "<td>$idProduto</td><td>$nomeProduto</td><td>$valorProduto</td>";
                                echo "</tr>";
                            }

                        }

                        // Fechar a conexão com o bando
                        mysqli_close($conexao);
                    ?>

                    <!-- <tr class=cor-diferente>
                        <td>2</td>
                        <td id="imagem-css"><img src="src/assests/images/caneca.jpg" alt="Caneca branca" class="img">Caneca branca sem estampa</td>
                        <td>20,00</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td id="imagem-js"><img src="src/assests/images/bone.jpg" alt="Boné branco" class="img">Boné branco sem estampa</td>
                        <td>40,00</td>
                    </tr>
                    <tr class="cor-diferente">
                        <td>6</td>
                        <td id="imagem-jq"><img src="src/assests/images/camiseta.jpg" alt="Camiseta Preta" class="img">Camiseta preta sem estampa</td>
                        <td>50,00</td>
                    </tr>  -->
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