<?php 
    include('verificarLogin.php');
    require "conexao.php";
    $id = filter_input(INPUT_GET, 'id');   

    if($id) {
        $sql = $pdo->prepare("DELETE FROM usuarios WHERE id = :id");
        $sql -> bindValue(':id', $id);
        $sql -> execute();
    } else {
        echo "Erro ao tentar excluir usuário";
    }

    header("Location: lista_usuarios.php");
?>

<h1>Excluir Usuário</h1>

<div>
    <br>
    <a href="lista_usuarios.php">Voltar</a>
</div>