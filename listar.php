<?php 

    include "db.php";

    $sql = "SELECT * FROM atividades";
    $result = $conn->query($sql);

    if ($result->num_rows>0) {
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
            echo "<td>".$row['usuario_atribuido']."</td>";
            echo "<td>".$row['producao']."</td>";
            echo "<td>".$row['insumos']."</td>";
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