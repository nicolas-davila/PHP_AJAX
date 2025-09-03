<?php

    include("../db.php");

    $atividade = $_POST["atividade"] ?? "";
    $usuarioAtribuido = $_POST["usuarioAtribuido"] ?? "";

    if(!empty($atividade) && !empty($usuarioAtribuido)){
        $atividade = $conn->real_escape_string($atividade);
        $usuarioAtribuido = $conn->real_escape_string($usuarioAtribuido);

        $sql = "INSERT INTO atividades (atividade, usuario_atribuido) VALUES ('$atividade', '$usuarioAtribuido')";

        if($conn->query($sql)===TRUE) {
            echo "Atividade cadastrada com sucesso!";
        } else {
            echo "Erro" . $conn->error;
        }
    }

    $conn->close();
?>