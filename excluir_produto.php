<?php 
    include('verificarLogin.php');
    require "conexao.php";

    $id = filter_input(INPUT_GET, 'id');   

    if($id) {
        $sql = $conexaoComBanco->prepare("DELETE FROM produtos WHERE id = :id");
        $sql -> bindValue(':id', $id);
        $sql -> execute();
    } else {
        echo "Erro ao tentar excluir produto";
    }

    header("Location: lista_produtos.php");
?>
