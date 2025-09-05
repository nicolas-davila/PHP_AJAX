<?php

include("db.php");

?>

<!DOCTYPE html>
<html lang="pt-BR">

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

    <div id="listaAtividades"></div>
    <div id="atualizaAtividade"></div>

    <script>
        $(document).ready(function() {
            carregarAtividades();
        })

        function carregarAtividades() {
            $.ajax({
                url: "listar.php",
                type: "GET",
                success: function(dados) {
                    $("#listaAtividades").html(dados);
                }
            })
        };

        function editarAtividade(botao) {
            let id = $(botao).data('id');
            $.ajax ({
                url: "editar_atividade.php",
                type: "GET",
                data: {
                    id:id
                },
                success: function(resposta) {
                    $("#atualizaAtividade").html(resposta);
                }
            })

        };

        function atualizaAtividade() {
            let id = $("input[name='id']").val();
            $.ajax ({
                url: "backend/editar_atividade.php",
                type: "POST",
                data: {
                    id:id,
                    atividade: $("#atividade").val(),
                    usuarioAtribuido: $("#usuarioAtribuido").val(),
                    producao: $("#producao").val()
                },
                success: function(resposta) {
                    alert(resposta);
                    carregarAtividades();
                }
            })
        }

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