<?php

    include "../db.php";

    $id = $_POST['id'] ?? "";
    $insumos_id = $_POST['insumos_id'] ?? "";
    $informacao_insumos = $_POST['informacao_insumos'] ?? "";

    if(!empty($id)){
        $insumos_id = $conn->real_escape_string($insumos_id);
        $informacao_insumos = $conn->real_escape_string($informacao_insumos);

        $sql = "INSERT INTO atividade_insumos (atividade_id, insumos_id, informacao_insumos) VALUES ($id, $insumos_id, '$informacao_insumos')";

        if($conn->query($sql)===TRUE) {
            echo "Insumos atribuido com sucesso!";
        } else {
            echo "Erro: " . $conn->error;
        }
    } else {
        echo "ID inválido ou não enviado!";
    }

    $conn->close();

?>