<?php 
    
    session_start();

    if(isset($_POST['usuario'], $_POST['senha'])) {
        if($_POST['usuario'] == 'master' && $_POST['senha'] == 'master00') {
            $_SESSION['logado'] = true;
            header('Location: index.php');  
        }

    }

    if(isset($_GET['erro'])) {
        $erro = 'Usuário/Senha inválido!';
    }
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
        <div style='color: red; margin: 10px;'>
            <?php echo $erro ?? '' ?>
        </div>
        <form action="#" method="post">
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

            <button>Acessar</button>
        </form>
    </div>
</body>
</html>