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
    <h2>Página de Receitas</h2>
    <a href="create_atividade.php">Criar nova atividade</a>
    <a href="create_usuario.php">Criar um novo usuário</a>
    <a href="create_insumos.php">Criar Insumos</a>

    <div id="listaUsuarios"></div>

    <script>
        $(document).ready(function() {
            carregarAtividades();
        })

        function editarAtividade() {
            alert("Função ok!");
        }

        function carregarAtividades() {
                $.ajax({
                    url: "listar.php",
                    type: "GET",
                    success: function(dados) {
                        $("#listaUsuarios").html(dados);
                    }
                })
            };

            $(document).on('click', '.excluir', function() {
                let id = $(this).data('id');

                if (confirm("Deseja realmente excluir esta atividade?")) {
                    $.ajax({
                        url: "backend/excluir_atividade.php",
                        type: "POST",
                        data: {
                            id: id
                        },
                        success: function(resposta) {
                            alert(resposta);
                            carregarAtividades();
                        }
                    })
                }
            });
    </script>

</body>

</html>