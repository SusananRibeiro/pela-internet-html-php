<?php 
    include('verificarLogin.php');
    require "conexao.php";
    $id = filter_input(INPUT_GET, 'id');   

    if($id) {
        $sql = $pdo->prepare("DELETE FROM vendas WHERE id = :id");
        $sql -> bindValue(':id', $id);
        $sql -> execute();
    } else {
        echo "Erro ao tentar excluir venda";
    }

    header("Location: lista_vendas.php");
?>
<h1>Excluir Venda</h1>

<div>
    <br>
    <a href="lista_vendas.php">Voltar</a>
</div>