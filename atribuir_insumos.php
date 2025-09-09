<?php

    include "db.php";

    $id = $_GET['id'] ?? 0;

    if ($id === 0) {
        die("ID inválido ou não enviado.");
    }
    $result = mysqli_query($conn, "SELECT * FROM atividades WHERE id = $id");
    $atividade = mysqli_fetch_assoc($result);

?>

<h3>Atribuir Insumos</h3>
<form id="formEdicao">
    <input type="hidden" name="id" value="<?= $atividade['id'] ?>">
    <p type="text" name="atividade" id="atividade" required>
        <?php echo $atividade['atividade'] ?>
    </p>
    <p id="usuarioAtribuido" name="usuarioAtribuido" required>
         <?php echo $atividade['usuario_atribuido'] ?>
    </p>
    <button type="submit" onclick="atribuiInsumos()">Atualizar</button>
</form>