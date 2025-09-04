<?php

    include("../db.php");

    $atividade = $_POST["atividade"] ?? "";
    $usuarioAtribuido = $_POST["usuarioAtribuido"] ?? "";
    $producao = $_POST["producao"] ?? "";

    if(!empty($atividade) && !empty($usuarioAtribuido)){
        $atividade = $conn->real_escape_string($atividade);
        $usuarioAtribuido = $conn->real_escape_string($usuarioAtribuido);
        $producao = $conn->real_escape_string($producao);

        $sql = "INSERT INTO atividades (atividade, usuario_atribuido, producao) VALUES ('$atividade', '$usuarioAtribuido', '$producao')";

        if($conn->query($sql)===TRUE) {
            echo "Atividade cadastrada com sucesso!";
        } else {
            echo "Erro" . $conn->error;
        }
    }

    $conn->close();
?>