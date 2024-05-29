<?php 
    require_once('verificar_login.php');
    require('conexao.php');
    
    if(isset($_POST['btn_salvarUsuario'])) {
        // $hashMD5 = md5($senhaDoUsuario);
        // // Só para teste
        // echo "O hash MD5 da senha é: " . $hashMD5."<br/>";
        $nomeUsuario = filter_input(INPUT_POST, 'txt_usuario');
        $senha = filter_input(INPUT_POST, 'txt_senha');

        if(empty($nomeUsuario)) {
            echo "<div class=erro>Nome do usuário é obrigatório</div>";
        } else if(empty($senha)) {
            echo "<div class=erro>Senha do usuário é obrigatório</div>";
        } else if($nomeUsuario && $senha) {
        // Ver se tem algum nome cadastrado primeiro fazer essa validação
        $sql = "SELECT * FROM usuarios WHERE nome_usuario = :nome";
        $statement = $conexaoComBanco -> prepare($sql);
        $statement -> bindValue(':nome', $nomeUsuario);
        $statement -> execute();

            // Ver se tem algum nome cadastrado
            if($statement -> rowCount() === 0) {
                $sql = "INSERT INTO usuarios (nome_usuario, senha) VALUES (:nome, :senha)";
                $statement = $conexaoComBanco->prepare($sql);
                $statement -> bindValue(':nome', $nomeUsuario);
                $statement -> bindValue(':senha', $senha);
                $statement -> execute();
                header("Location: lista_usuarios.php");
                exit; // para sair do IF

            } else {
                echo "<div class=erro>Nome de usuário já cadastrado.</div>";
            }

        } else {
            echo "<div class=erro>Erro ao cadastrar usuário</div>";
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
            <div>
                <label for="">Usuário: </label><br>
                <input type="text" name="txt_usuario">
            </div>
            <div>
                <label for="">Senha: </label><br>
                <input type="password" name="txt_senha">
            </div>
            <div>
                <input type="submit" name="btn_salvarUsuario" value="Salvar">
                <input type="reset" name="btn_limparUsuario" value="Limpar">
            </div>
        </form>
    </div>
    <div>
        <a href="lista_usuarios.php">Voltar</a>
    </div>
</body>
</html>