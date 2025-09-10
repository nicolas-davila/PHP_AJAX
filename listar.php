<?php 

    include "db.php";

    $sql = "SELECT a.id, a.atividade, a.producao, u.nome AS usuario FROM atividades
    AS a LEFT JOIN usuarios AS u ON a.usuario_atribuido = u.id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table border='1' cellpadding='5'>";
        echo "<tr>
                    <th>Id</th>
                    <th>Atividade</th>
                    <th>Pessoa Atribuida</th>
                    <th>Status</th>
                    <th>Insumos</th>
                    <th>Ações</th>
            </tr>";

        while($row = $result->fetch_assoc()){
            echo "<tr>";
            echo "<td>".$row['id']."</td>";
            echo "<td>".$row['atividade']."</td>";
            echo "<td>".$row['usuario']."</td>";
            echo "<td>".$row['producao']."</td>";

            $insumos_query = "SELECT i.descricao_insumos, ai.informacao_insumos 
            FROM atividade_insumos AS ai JOIN insumos AS i ON i.id = ai.insumos_id
            WHERE ai.atividade_id = " . $row['id'];

            $insumos_result = $conn->query($insumos_query);

            echo "<td>";
            
                if($insumos_result->num_rows > 0) {
                    while($insumo = $insumos_result->fetch_assoc()) {
                        echo $insumo['descricao_insumos'] . " - " .$insumo['informacao_insumos'] . "<br>";
                    };
                };

            echo"</td>";
            echo "<td>
                    <button class='atribuirInsumos' onclick='atribuirInsumos(this)' data-id='" . $row['id'] . "'>Atribuir Insumos</button>
                    <button class='editar' onclick='editarAtividade(this)' data-id='" . $row['id'] . "'>Editar</button>
                    <button class='excluir' onclick='' data-id='" . $row['id'] . "'>Excluir</button>
                </td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "Nenhuma atividade encontrada";
    };
    $conn->close();
?>