<?php 

    include "../db.php";

    $id = $_POST["id"] ?? "";
    $atividade = $_POST["atividade"] ?? "";
    $usuarioAtribuido = $_POST["usuarioAtribuido"] ?? ""; // corrigido
    $producao = $_POST["producao"] ?? "";

    if(!empty($id)) {
        $atividade = $conn->real_escape_string($atividade);
        $usuarioAtribuido = $conn->real_escape_string($usuarioAtribuido);
        $producao = $conn->real_escape_string($producao);

        $sql = "UPDATE atividades SET atividade='$atividade', usuario_atribuido='$usuarioAtribuido', producao='$producao' WHERE id=$id";

        if($conn->query($sql)===TRUE) {
            echo "Atividade atualizada com sucesso!";
        } else {
            echo "Erro: " . $conn->error;
        }

    } else {
        die ("ID inválido ou não enviado.");
    }

    $conn->close();
?>
