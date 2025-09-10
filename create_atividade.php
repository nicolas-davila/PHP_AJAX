<?php

        include "db.php";

?>

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

    <form id="formCadastro">
        <select name="atividade" id="atividade" required>
            <option>Separar ingredientes</option>
            <option>Bater Ovos</option>
            <option>Misturar ovos para massa homogênea</option>
            <option>Acrescentar leite e farinha</option>
            <option>Acrescentar ovo e fermento na massa</option>
            <option>Untar forma</option>
            <option>Despejar massa na forma</option>
            <option>Colocar para assar em um forno</option>
        </select>
        <select id="usuarioAtribuido" name="usuario_atribuido" required>
            <?php
        
                $usuarios = mysqli_query($conn, "SELECT * FROM usuarios");
                while($usuario = mysqli_fetch_assoc($usuarios)){
                    echo "<option value='{$usuario['id']}'>{$usuario['nome']}</option>";
                }

            ?>
        </select>
        <select id="producao">
            <option>pendente</option>
            <option>pausado</option>
            <option>concluido</option>
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
                        usuarioAtribuido: $("#usuarioAtribuido").val(),
                        producao: $("#producao").val()
                    },
                    success: function(resposta) {
                        $("#resultado").html(resposta);
                        window.location.href="index.php";
                    }
                });
            });
        });
    </script>
</body>

</html>