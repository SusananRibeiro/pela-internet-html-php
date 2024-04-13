<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="src/assest/images/produto.ico">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="src/styles/config.css">
    <title>Lista Produtos</title>
</head>
<body>
    <main class="container">
        <h1>Lista de Produtos</h1>
        <div class="container-table">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Valor</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="cor-diferente">
                        <td>2</td>
                        <td id="imagem-css"><img src="src/assests/images/caneca.jpg" alt="Caneca branca" class="img">Caneca branca sem estampa</td>
                        <td>20,00</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td id="imagem-js"><img src="src/assests/images/bone.jpg" alt="Boné branco" class="img">Boné branco sem estampa</td>
                        <td>40,00</td>
                    </tr>
                    <tr class="cor-diferente">
                        <td>6</td>
                        <td id="imagem-jq"><img src="src/assests/images/camiseta.jpg" alt="Camiseta Preta" class="img">Camiseta preta sem estampa</td>
                        <td>50,00</td>
                    </tr> 
                </tbody>
            </table>
        </div>
    </main>
    <script src="src/scripts/config_script.js"></script>
    <script>

        $("#imagem-jq").mouseover(function(){
            const imagem =  $(this);
            imagem.children().addClass("imagem");
        });

        $("#imagem-jq").mouseout(function(){
            const imagem =  $(this);
            imagem.children().removeClass("imagem");
        });

    </script>
</body>
</html>