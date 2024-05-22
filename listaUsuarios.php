<?php 
    include('verificarLogin.php');
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
        <h1>Lista de Usuários</h1>
        <div class="container-table">
            <table>
                <thead>
                    <tr>
                        <th>Nome do Usuário</th>
                        <th>Senha</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        include "conexao.php";

                        $sql = "SELECT * FROM usuarios";
                        $resultado = mysqli_query($conexao, $sql);
                    
                        while($registro = mysqli_fetch_row($resultado)) {
                            $nomeUsuario = $registro[1];
                            $senhaUsuario = $registro[2];
                            echo "<tr>";
                            echo "<td>$nomeUsuario</td><td>$senhaUsuario</td>";
                            echo "</tr>";
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