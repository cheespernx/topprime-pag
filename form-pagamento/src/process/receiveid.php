<?php
  session_start();
  include_once('dbcon.php');
  
  if(isset($_GET['idplano'])){
    $idplano = $_GET['idplano'];
  }
  $sql = "INSERT INTO planos (plano, date_cad) VALUES ('$idplano', NOW())"; // QUERY de Inserção

  $result = mysqli_query($conn, $sql);  // Execução da QUERY
  
  $_SESSION['plano-ativo'] = $idplano;
  $_SESSION['idPl'] = mysqli_insert_id(); // Captura o ID de inserção

  echo "<script> console.log('Generated ID: ".mysqli_insert_id($result)."') </script>";
  header('Location: https://form.jotformz.com/92596110723658');
  
  $conn->close();
  exit;
?>