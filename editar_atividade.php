<?php

    include "db.php";

    $id = isset($_GET['id']) ? intval($_GET['id']) : 0;
    if ($id === 0) {
        die("ID inválido ou não enviado.");
    }
    $result = mysqli_query($conn, "SELECT * FROM atividades WHERE id = $id");
    $atividade = mysqli_fetch_assoc($result);

?>
<h3>Editar Atividade</h3>
<form id="formEdicao">
    <select name="atividade" id="atividade" required>
        <option>
            <?php echo $atividade['atividade'] ?>
        </option>
        <option>Separar ingredientes</option>
        <option>Bater Ovos</option>
        <option>Misturar ovos para massa homogênea</option>
        <option>Acrescentar leite e farinha</option>
        <option>Acrescentar ovo e fermento na massa</option>
        <option>Untar forma</option>
        <option>Despejar massa na forma</option>
        <option>Colocar para assar em um forno</option>
    </select>
    <select id="usuarioAtribuido" name="usuario_atribuido" required>
        <option>
            <?php echo $atividade['usuario_atribuido'] ?>
        </option>
        <option>Carlos</option>
        <option>João</option>
        <option>Gabriel</option>
    </select>
    <select id="producao">
        <option>pendente</option>
        <option>pausado</option>
        <option>concluido</option>
    </select>
    <button type="submit">Atualizar</button>
</form>

<script>

    
</script>