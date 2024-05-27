<?php 
    require_once('verificarLogin.php');
    require('conexao.php');

    $lista = [];
    $sql = "SELECT * FROM usuarios";
    $statement = $conexaoComBanco -> query($sql); 
    // Valida sem tem registro no banco de dados
    if($statement -> rowCount() > 0) {
        $lista = $statement -> fetchAll(PDO::FETCH_ASSOC);
    }


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="icon" type="image/x-icon" href="src/assest/images/cliente.ico"> -->
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="src/styles/config.css">
    <title>Lista de Usuárioss</title>
</head>
<body>
    <main class="container">

        <a href="cadastro_usuario.php">Novo</a>

        <h1>Lista de Usuários</h1>
        <div class="container-table">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome do Usuário</th>
                        <th>Senha</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($lista as $usuario): ?>
                        <tr>
                            <td><?= $usuario['id']; ?></td>
                            <td><?= $usuario['nome_usuario']; ?></td>
                            <td><?= $usuario['senha']; ?></td>
                            <td><a href="edicao_usuario.php?id=<?= $usuario['id']; ?>">Editar</a></td>
                            <td><a href="excluir_usuario.php?id=<?= $usuario['id']; ?>">Excluir</a></td>                               
                        </tr>
                    <?php endforeach; ?> 
                </tbody>
            </table>
        </div>    
    </main>        
</body>
</html>