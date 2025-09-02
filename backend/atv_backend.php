<?php

    require("./PHP_AJAX/db.php");

    if (isset($_POST['atividade']) && isset($_POST['usuario_atribuido'])) {
        $atividade = $_POST['atividade'];
        $usuario_atribuido = $_POST['usuario_atribuido'];

        try {
            $sql = "INSERT INTO atividades (atividade, usuario_atribuido) VALUES (:atividade, :usuario_atribuido)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":atividade", $nome);
            $stmt->bindParam(":usuario_atribuido", $email);

            if ($stmt->execute()) {
                echo "✅ Cadastro realizado com sucesso!";
            } else {
                echo "❌ Erro ao cadastrar.";
            }
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
        } 
    }
?>