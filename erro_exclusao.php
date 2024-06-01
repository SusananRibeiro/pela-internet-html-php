<?php 
    require_once('verificar_login.php');

    $acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;

    if($acao === 'cliente') {
        echo "<div class=erro> CLIENTE já possui vendas, não pode ser excluido.</div>";
    } else if($acao === 'produto') {
        echo "<div class=erro>PRODUTO já possui vendas, não pode ser excluido.</div>";
    } else {
        echo "<div class=erro>Erro ao tentar excluir.</div>";
    }
    
?>
<link rel="stylesheet" href="src/styles/cadastro_style.css">