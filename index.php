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
    <h2>Testing how to bring a message</h2>
    <button onclick="bringMessage()">Click here!</button>
    <div id="result"></div>
    <!-- <p id="result"></p> -->


    <script>
        function bringMessage() {
            // se declara a variável e faz uma request
            let xhr = new XMLHttpRequest();

            // Aqui configura a requisição variavel.open("method", "arquivo.php", true). O true é para ser assíncrono
            xhr.open("GET", "message.php", true);
            
            // O que fazer quando a requisição chegar
            xhr.onload = function() {
                if (xhr.status === 200) {
                    document.getElementById("result").innerHTML = xhr.responseText;
                };
            };
            xhr.send();
        }
    </script>

</body>
</html>