<?php 
    require_once('verificarLogin.php');
    require('conexao.php');

    $id = filter_input(INPUT_GET, 'id');   

    if($id) {
        $sql = "DELETE FROM produtos WHERE id = :id";
        $statement = $conexaoComBanco->prepare($sql);
        $statement -> bindValue(':id', $id);
        $statement -> execute();
    } else {
        echo "Erro ao tentar excluir produto";
    }

    header("Location: lista_produtos.php");
?>
