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
    <p id="atividade" name="atividade">
        Atividade: <?php echo $atividade['atividade'] ?>
    </p>
    <p id="usuarioAtribuido" name="usuarioAtribuido">
        Pessoa atribuida:  <?php echo $atividade['usuario_atribuido'] ?>
    </p>
    <select id="insumos_id" name="insumos_id">
        <?php 
        
            $insumos = mysqli_query($conn, "SELECT * FROM insumos");
            while($insumo = mysqli_fetch_assoc($insumos)) {
                echo "<option value='{$insumo['id']}'>{$insumo['descricao_insumos']}</option>";
            };

        ?>
    </select>
    <input type="text" id="informacao_insumos" name="informacao_insumos" required>
    <button type="submit" onclick="atribuiInsumos()">Atribuir Insumos</button>
</form>