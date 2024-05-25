<?php 
    include('verificarLogin.php');

    // include "conexao.php"

    // if(isset($_POST["btn_Excluir"])) {
    //     $registros = [];
    
    //     if($_GET['excluir']) {
    //         $excluirSQL = "DELETE FROM usuarios WHERE id = ?";
    //         $stmt = $conexao->prepare($excluirSQL); // statement
    //         $stmt->bind_param("i", $_GET['excluir']); // "i" é o tipo do parâmetro, neste caso inteiro
    //         $stmt->execute();
    //     }
    
    //     // Para criar a tabela HTML
    //     $sql = "SELECT id, nome_usuario, senha FROM usuarios";
    //     $resultado = $conexao->query($sql);
    //     if($resultado->num_rows > 0) {
    //         while($row = $resultado->fetch_assoc()) {
    //             $registros[] = $row;
    //         }
    //     } elseif($conexao->error) {
    //         echo "Erro: " . $conexao->error;   
    //     }

    // }


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
                    <?php
                        include "conexao.php";
                        $contadorUsuario = 1;
                        $sql = "SELECT * FROM usuarios";
                        $resultado = mysqli_query($conexao, $sql);
                    
                        while($registro = mysqli_fetch_row($resultado)) {
                            $idUsuario = $registro[0];
                            $nomeUsuario = $registro[1];
                            $senhaUsuario = $registro[2];
                            $numeroParUsuario = $contadorUsuario % 2;
                            
                            if($numeroParUsuario != 0) {
                                echo "<tr class=cor-diferente>";
                                echo "<td>$idUsuario</td><td>$nomeUsuario</td><td>$senhaUsuario</td>";
                                echo "<td><a href=edicao_usuario.php>Editar</a></td>";
                                echo "<td><a href=excluir_cliente.php name=btn_Excluir>Excluir</a></td>";
                                echo "</tr>";

                            } else {
                                echo "<tr>";
                                echo "<td>$idUsuario</td><td>$nomeUsuario</td><td>$senhaUsuario</td>";
                                echo "<td><a href=edicao_usuario.php>Editar</a></td>";
                                echo "<td><a href=excluir_usuario.php name=btn_Excluir>Excluir</a></td>";
                                echo "</tr>";
                            }
                            $contadorUsuario++;                           

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