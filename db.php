<?php 

   // Começando a usar PDO 
   $host="localhost";
   $db="preparo_bolo";
   $user="root";
   $pass= "012220";

   try {
      $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      // echo "Conexão Realizada com Sucesso!";

   } catch (Exception $e) {
      echo "Erro de conexão: " . $e->getMessage();
   };

?>