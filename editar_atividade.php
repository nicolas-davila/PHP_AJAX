<?php

    include "db.php";

    $id = $_GET["id"] ?? 0;
    if ($id === 0) {
        die("ID inválido ou não enviado.");
    }
    $result = mysqli_query($conn, "SELECT * FROM atividades WHERE id = $id");
    $atividade = mysqli_fetch_assoc($result);

?>
<h3>Editar Atividade</h3>
<form id="formEdicao">
    <input type="hidden" name="id" value="<?= $atividade['id'] ?>">
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
    <select id="usuarioAtribuido" name="usuarioAtribuido" required>
        <?php
        
            $usuarios = mysqli_query($conn, "SELECT * FROM usuarios");
            while($usuario = mysqli_fetch_assoc($usuarios)){
                echo "<option value='{$usuario['id']}'>{$usuario['nome']}</option>";
            }

        ?>
    </select>
    <select id="producao">
        <option>pendente</option>
        <option>pausado</option>
        <option>concluido</option>
    </select>
    <button type="submit" onclick="atualizaAtividade()">Atualizar</button>
</form>