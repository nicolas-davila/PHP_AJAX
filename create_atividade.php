<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar atividade</title>
</head>

<body>
    <h2>Cadastrar Usuário</h2>

    <form>
        <input type="text" id="atividade">
        <select id="usuario_atribuido">
            <option>Nicolas</option>
            <option>Ana Julia</option>
            <option>Ana Beatriz</option>
        </select>
        <button type="submit" onclick="cadastrarUsuario()">Cadastrar</button>
    </form>

    <script>
        function cadastrarUsuario(event) {
            let atividade = document.getElementById("atividade").value;
            let usuario_atribuido = document.getElementById("usuario_atribuido").value;

            let cadastrar = new XMLHttpRequest();
            cadastrar.open("POST", "atv_backend.php", true);
            cadastrar.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

            cadastrar.onload = function() {
                if (cadastrar.status == 200) {
                    console.log(cadastrar.responseText); // mostra o retorno do PHP
                } else {
                    console.log("Erro.");
                }
            };

            cadastrar.send("atividade=" + encodeURIComponent(atividade) + "&usuario_atribuido=" + encodeURIComponent(usuario_atribuido));
        }
    </script>
</body>

</html>