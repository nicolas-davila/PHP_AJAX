<?php

    include "../db.php";

    $id = $_POST['id'] ?? "";
    $insumos = $POST['insumos'] ?? "";

    if(!empty($id)){
        $insumos = $conn->real_escape_string($insumos);

        $sql = "UPDATE atividades SET insumos='$insumos' WHERE id=$id";

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