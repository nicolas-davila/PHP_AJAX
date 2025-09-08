<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar atividade</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <h2>Cadastrar Atividade</h2>

    <form id="formCadastroInsumos">
        <input id="insumos" name="insumos" type="text" placeholder="Ex: 5 colheres de açucar" required>
        <button type="submit">Cadastrar</button>
    </form>

    <div id="resultado"></div>

    <script>
        $(document).ready(function() {
            $("#formCadastroInsumos").on("submit", function(e){
                e.preventDefault();

                $.ajax({
                    url:"./backend/create_insumos.php",
                    type:"POST",
                    data: {
                        atividade: $("#insumos").val(),
                    },
                    success: function(resposta) {
                        $("#resultado").html(resposta);
                        // window.location.href="index.php";
                    }
                });
            });
        });
    </script>
</body>

</html>