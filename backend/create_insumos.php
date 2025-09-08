<?php

    include("../db.php");

    $insumos = $_POST["insumos"] ?? "";

    if(!empty($insumos)){
        $insumos = $conn->real_escape_string($insumos);

        $sql = "INSERT INTO insumos (descricao_insumos) VALUES ('$insumos')";

        if($conn->query($sql)===TRUE) {
            echo "Insumo cadastrado com sucesso!";
        } else {
            echo "Erro" . $conn->error;
        }
    }

    $conn->close();
?>