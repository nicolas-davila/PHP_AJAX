<?php

    include "../db.php";

    $id = $_POST['id'];

    if(!empty($id)) {
        $sql = "SELECT id FROM atividades WHERE usuario_atribuido=$id";
        $result = $conn->query($sql);

        if($result->num_rows > 0){
            echo "Não foi possível excluir usuário! Pois ele está vinculado a uma atividade.";
        } else {
            $sqlExcluir = "DELETE FROM usuarios WHERE id=$id";
            if($conn->query($sqlExcluir) === TRUE) {
                echo "Usuário excluido com sucesso!";
            } else {
                echo "Erro: " . $conn->error;
            }
        }
    }

?>