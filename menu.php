<?php 
    include('verificarLogin.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="src/styles/menu_style.css">
    <title>Menu</title>
</head>
<body>
    <div>
        <ul class="menu">
            <li id="submenu_cadastros">Cadastros
                <ul>
                    <li><a href="listaClientes.php" target="lista" title="Lista de Clientes">Clientes</a></li>
                    <li><a href="listaProdutos.php" target="lista" title="Lista de Produtos">Produtos</a></li>
                    <li><a href="listaUsuarios.php" target="lista" title="Lista de Produtos">Usuários</a></li>
                </ul>
            </li>
        </ul>
    
        <ul class="menu">
            <li id="submenu_vendas">Vendas
                <ul>
                    <li><a href="listaVendas.php" target="lista" title="Lista de Vendas">Vendas</a></li>
                </ul>
            </li>
        </ul>
    </div>
    <script src="src/scripts/menu_script.js"></script>
    <script>
        // Vendas feito em jQuery
        $("#submenu_vendas").click(function(){
            $(this).toggleClass("submenu");
        });
    </script>
</body>
</html>