<?php

include("db.php");

?>

<!DOCTYPE html>
<html lang="pt=BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Testing AJAX for the first time!</title>
</head>

<body>
    <h2>Teste de como trazer mensagem via ajax!</h2>
    <button onclick="trazerMensagem()">Click here!</button>
    <div id="resultado"></div>
    <h2>Página de Receitas</h2>
    <a href="create_atividade.php">Criar nova atividade</a>
    <a href="create_usuario.php">Criar um novo usuário</a>
    <a href="create_insumos.php">Criar Insumos</a>
    
    <table border="1" cellpadding="10">
        <tr>
            <th>Id</th>
            <th>Atividade</th>
            <th>Pessoa Atribuida</th>
            <th>Status</th>
            <th>Insumos</th>
            <th>Ações</th>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </table>


    <script>
        function trazerMensagem() {
            // se declara a variável e faz uma request. Sempre colocar "new".
            let xhr = new XMLHttpRequest();

            // Aqui configura a requisição variavel.open("method", "arquivo.php", true). O true é para ser assíncrono
            xhr.open("GET", "message.php", true);

            // O que fazer quando a requisição chegar
            xhr.onload = function() {
                if (xhr.status === 200) {
                    document.getElementById("resultado").innerHTML = xhr.responseText;
                };
            };
            xhr.send();
        }
    </script>

</body>

</html>