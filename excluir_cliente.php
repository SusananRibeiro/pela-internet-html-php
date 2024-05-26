<?php 
    include('verificarLogin.php');
    require "conexao.php";
    $id = filter_input(INPUT_GET, 'id');   

    if($id) {
        $sql = $conexaoComBanco->prepare("DELETE FROM clientes WHERE id = :id");
        $sql -> bindValue(':id', $id);
        $sql -> execute();
    } else {
        echo "Erro ao tentar excluir cliente";
    }

    header("Location: lista_clientes.php");
?>