<?php

    include "../db.php";

    $nome = $_POST['nome'];

    if(!empty($nome)){
        $nome = $conn->real_escape_string($nome);

        $sql = "INSERT INTO usuarios (nome) VALUES ('$nome')";

        if($conn->query($sql) === TRUE){
            echo "Usuário cadastrado com sucesso";
        } else {
            echo "Erro: " . $conn->error;
        }
    }

    $conn->close();

?>