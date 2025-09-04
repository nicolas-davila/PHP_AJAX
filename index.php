<?php

include("db.php");

?>

<!DOCTYPE html>
<html lang="pt=BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Testing AJAX for the first time!</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

<body>
    <h2>Teste de como trazer mensagem via ajax!</h2>
    <button onclick="trazerMensagem()">Click here!</button>
    <div id="resultado"></div>
    <h2>Página de Receitas</h2>
    <a href="create_atividade.php">Criar nova atividade</a>
    <a href="create_usuario.php">Criar um novo usuário</a>
    <a href="create_insumos.php">Criar Insumos</a>

    <div id="listaUsuarios"></div>

    <script>
        $(document).ready(function (){
            function carregarAtividades() {
                $.ajax({
                    url: "listar.php",
                    type: "GET",
                    success: function(dados) {
                        $("#listaUsuarios").html(dados);
                    }
                })
            };
            carregarAtividades();
        })
    </script>

</body>

</html>