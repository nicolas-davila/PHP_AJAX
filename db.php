<?php 

   // Começando a usar PDO 
   $host="localhost";
   $db="preparo_bolo";
   $user="root";
   $pass= "";

   $conn = mysqli_connect("$host", "$user", "$pass", "$db");
   
   if(!$conn){
      die ("Erro de conexão" . mysqli_connect_error());
   };
?>