<?php 
    include('verificarLogin.php');
    require "conexao.php";
    
    if(isset($_POST['btn_salvarUsuario'])) {
        // $hashMD5 = md5($senhaDoUsuario);
        // // Só para teste
        // echo "O hash MD5 da senha é: " . $hashMD5."<br/>";
        $nomeUsuario = filter_input(INPUT_POST, 'txt_usuario');
        $senha = filter_input(INPUT_POST, 'txt_senha');

        if($nomeUsuario && $senha) {
        // Ver se tem algum nome cadastrado primeiro fazer essa validação
        $sql = $conexaoComBanco -> prepare("SELECT * FROM usuarios WHERE nome_usuario = :nome");
        $sql -> bindValue(':nome', $nomeUsuario);
        $sql -> execute();

            // Ver se tem algum e-mail cadastrado
            if($sql -> rowCount() === 0) {
                $sql = $conexaoComBanco->prepare("INSERT INTO usuarios (nome_usuario, senha) VALUES (:nome, :senha)");
                $sql -> bindValue(':nome', $nomeUsuario);
                $sql -> bindValue(':senha', $senha);
                $sql -> execute();
                header("Location: lista_usuarios.php");
                exit; // para sair do IF

            } else {
                echo "Nome de usuário já cadastrado";
            }

        } else {
            echo "Erro ao cadastrar usuário";
            exit;
        }
    }

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta http-equiv="Content-Type" content="text/html">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="assests/images/home.ico">
    <link rel="stylesheet" href="src/styles/cadastro_style.css">
    <title>Novo Usuários</title>
</head>
<body>

    <h1>Cadastro Usuário</h1>
    <div class="conteudo">
        <form name="CadastroUsuario" method="post" action="cadastro_usuario.php">
            <label for="">Usuário: </label><br>
            <input type="text" name="txt_usuario">
            
            <label for="">Senha: </label><br>
            <input type="password" name="txt_senha"> 

            <input type="submit" name="btn_salvarUsuario" value="Salvar">
            <input type="reset" name="btn_limparUsuario" value="Limpar">
        </form>
    </div>
    <div>
        <a href="lista_usuarios.php">Voltar</a>
    </div>
</body>
</html>