<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar atividade</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <h2>Cadastrar Usuário</h2>

    <form id="formCadastro">
        <input type="text" id="atividade" name="atividade" required>
        <select id="usuarioAtribuido" name="usuario_atribuido" required>
            <option>Nicolas</option>
            <option>Ana Julia</option>
            <option>Ana Beatriz</option>
        </select>
        <button type="submit">Cadastrar</button>
    </form>

    <div id="resultado"></div>

    <script>
        $(document).ready(function() {
            $("#formCadastro").on("submit", function(e){
                e.preventDefault();

                $.ajax({
                    url:"./backend/atv_backend.php",
                    type:"POST",
                    data: {
                        atividade: $("#atividade").val(),
                        usuarioAtribuido: $("#usuarioAtribuido").val()
                    },
                    success: function(resposta) {
                        $("#resultado").html(resposta);
                    }
                });
            });
        });
    </script>
</body>

</html>