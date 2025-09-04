<?php 

    include "../db.php";

    $id = $_POST['id'] ?? "";

    if(!empty($id)) {
        $sql = "DELETE FROM atividades WHERE id = $id";
        if($conn->query($sql)===TRUE) {
            echo "Atividade excluida com sucesso!";
            
        } else {
            echo "Erro: " . $conn->error;
        }
    } else {
        echo "ID inválido!";
    };
?>