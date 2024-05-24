<?php 
    include "conexao.php";
    session_start();

    if(isset($_POST['btn_acessar'])) {
        $usuario = $_POST['usuario'];
        $senha = $_POST['senha'];

        $sql = "SELECT * FROM usuarios WHERE nome_usuario = '$usuario' AND senha = '$senha'";
        $resultado = mysqli_query($conexao, $sql);
        $linhas = mysqli_affected_rows($conexao);

        if($linhas > 0) {
            $_SESSION['logado'] = true;
            header('Location: index.php');  
        } else if (isset($_GET['erro'])) {
            $erro = 'Usuário/Senha inválido!';
        }
    } 

    mysqli_close($conexao);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/styles/login_style.css">
    <title>Login</title>
</head>
<body>
    <div class="conteudo">
        <div style='color: red; font-size: 11px; margin: 10px;'>
            <?php echo $erro ?? '' ?>
        </div>
        <form action="#" method="post" action="login.php">
            <div>
                <div>
                    <label for="usuario">Usuário</label>
                </div>
                <div>
                    <input type="text" name="usuario" id="usuario">
                </div>
                <div>
                    <label for="senha">Senha</label>
                </div>
                <div>
                    <input type="password" name="senha" id="senha">
                </div>
            </div>

            <button name="btn_acessar">Acessar</button>
        </form>
    </div>
</body>
</html>