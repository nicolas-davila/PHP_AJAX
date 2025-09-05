<?php 

    include "../db.php";

    $id = $_POST["id"] ?? "";

    $result = mysqli_query($conn, "SELECT * FROM atividades WHERE id = $id");

    if(!empty($id)) {
    }

?>