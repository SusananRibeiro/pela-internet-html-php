<?php 
    // $_SESSION['logado'] = true;
    // Sempre iniciar com session_start();
    session_start(); 
    $usuario = $_POST['usuario']; // "usuario" é o mesmo nome que está na tag input no name
    $senha = $_POST['senha']; // "senha" é o mesmo nome que está na tag input no name

    if($_POST['usuario']) {
        $dados = [
            [
                "nome" => "Susana Ribeiro",
                "usuario" => "susana",
                "senha" => "1234567",
            ],
            [
                "nome" => "Camila Medeiros",
                "usuario" => "camila",
                "senha" => "7654321",
            ],
        ];

        // Verifica que o e-mail e senha foram fornecidos corretamente para fazer o login
        foreach($dados as $dado) {
            $usuarioValido = $usuario === $dado['usuario'];
            $senhaValida = $senha === $dado['senha'];

            if($usuarioValido && $senhaValida) {
                $_SESSION['erros'] = null;
                $_SESSION['dado'] = $dado['usuario'];
                $expira = time() + 60 * 60 * 24 * 30; // cria um cookie com validade de 30 dias
                setcookie('dado', $dado['usuario'], $expira);
                header('Location: index.php');
            }
        }

        if(!$_SESSION['dado']) {
            $_SESSION['erros'] = ['Usuário/Senha inválido!'];
        }
    }

    
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <div>
        <form action="#" method="post">
            <div>
                <label for="usuario">Usuário</label>
                <input type="text" name="usuario" id="usuario">
            </div>
            <div>
                <label for="senha">Senha</label>
                <input type="password" name="senha" id="senha">
            </div>
            <button>Acessar</button>
        </form>
    </div>
</body>
</html>