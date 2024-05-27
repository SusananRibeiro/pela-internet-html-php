<?php 
    require_once('verificarLogin.php');
    require('conexao.php');

    // GET
    $dadosUsuario = [];
    $id = filter_input(INPUT_GET, 'id'); // "'id'" é o nome da variável da URL

    if($id) {
        $sql = "SELECT * FROM usuarios WHERE id = :id";
        $statement = $conexaoComBanco -> prepare($sql);
        $statement -> bindValue(':id', $id);
        $statement -> execute();

        if($statement -> rowCount() > 0) {
            $dadosUsuario = $statement -> fetch(PDO::FETCH_ASSOC); // "fetch()" para mapiar as informações separadamente
        } else  {
            header('Location: lista_usuarios.php');
            exit;
        }
    } else {
        echo "ID inválido";
    }

    // POST 
    if(isset($_POST['btn_Atualizar'])) {
        $dadosUsuario = [];
        $id = filter_input(INPUT_POST, 'txt_id'); 
        $nome = filter_input(INPUT_POST, 'txt_nome');
        $senha = filter_input(INPUT_POST, 'txt_senha');

        if($id && $nome && $senha) {
            $sql = "UPDATE usuarios SET nome_usuario = :nome, senha = :senha WHERE id = :id";
            $statement = $conexaoComBanco -> prepare($sql);
            $statement -> bindValue(':nome', $nome);
            $statement -> bindValue(':senha', $senha);
            $statement-> bindValue(':id', $id);
            $statement-> execute();

            header("Location: lista_usuarios.php");
            // echo "Usuário atualizado com sucesso!<br/>";
            exit;

        } else {
            echo "Erro ao atualizar usuário!<br/>";
            exit;
        }
    }

?>
<head>
    <meta http-equiv="Content-Type" content="text/html">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="assests/images/home.ico">
    <link rel="stylesheet" href="src/styles/edicao_style.css">
</head>
<body>
    <h1>Editar Usuário</h1>
    <div class="conteudo">
        <form name="CadastroUsuario" method="post" action="#">
            <label for="">ID:</label>
            <input type="text" name="txt_id" value="<?= $dadosUsuario['id'];?>" readonly/> 

            <label for="">Nome:</label>
            <input type="text" name="txt_nome" value="<?= $dadosUsuario['nome_usuario'];?>" />

            <label>Senha: </label>
            <input type="text" name="txt_senha"  value="<?= $dadosUsuario['senha'];?>" />

            <input type="submit" name="btn_Atualizar" value="Atualizar" />
        </form>
    </div>
    <div>
        <a href="lista_usuarios.php">Voltar</a>
    </div>
</body>
</html>