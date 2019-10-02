<?php
  session_start();
  /* Dados do Banco de Dados a conectar */
  $servername = "sql170.main-hosting.eu";
  $database = "u668533246_odon";
  $username = "u668533246_odon";
  $password = "aw96b6k13751";
  $conn = mysqli_connect($servername, $username, $password, $database);
  if (!$conn) {
      echo "<script> console.log('Erro ao Conectar ao MySql') </script>";
      die("Connection failed: " . mysqli_connect_error());
  }

  echo "<script> console.log('Conectado ao MySql') </script>";
?>