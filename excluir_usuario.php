<?php 
    include('verificarLogin.php');
    require "conexao.php";
    $id = filter_input(INPUT_GET, 'id');   

    if($id) {
        $sql = $conexaoComBanco->prepare("DELETE FROM usuarios WHERE id = :id");
        $sql -> bindValue(':id', $id);
        $sql -> execute();
    } else {
        echo "Erro ao tentar excluir usuário";
    }

    header("Location: lista_usuarios.php");
?>