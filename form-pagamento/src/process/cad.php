<?php 
  session_start();
  include_once('dbcon.php');

  // Captura de Leads
  $nome = $_POST['nome'];
  $email = $_POST['email'];
  $telefone = $_POST['telefone'];
  $pageID = $_POST['page-id'];

  // Query de Captura de Leads
  $query = "INSERT INTO leads (nome, email, telefone, data_cad) VALUES ('$nome', '$email', '$telefone', NOW())";

  // Execução de Query
  $exec = mysqli_query($conn, $query);

  // Resultado da Execução da Query
  $result = mysqli_affected_rows($exec);

  // Teste do Resultado // Independe da Query
  if($pageID == 'start'){
    echo "<script> console.log('Inserção executada!'); </script>";
    echo "<script> console.log('Status: 200'); </script>";
    header("Location: stage2.html");
  } else if($pageID == 'stage2'){
    echo "<script> console.log('Inserção executada!'); </script>";
    echo "<script> console.log('Status: 200'); </script>";
    header("Location: stage3.html");
  }
?>