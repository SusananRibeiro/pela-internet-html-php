<?php 
    include('verificarLogin.php');
    require "conexao.php";
    
    $lista = [];
    $sql = $pdo -> query("SELECT * FROM produtos"); 
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
                    <?php foreach($lista as $produto): ?>
                        <tr>
                            <td><?= $produto['id']; ?></td>
                            <td><?= $produto['nome_produto']; ?></td>
                            <td><?= $produto['valor']; ?></td>
                            <td><a href="edicao_produto.php?id=<?= $produto['id']; ?>">Editar</a></td>
                            <td><a href="excluir_produto.php?id=<?= $produto['id']; ?>">Excluir</a></td>                               
                        </tr>
                    <?php endforeach; ?>                    
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