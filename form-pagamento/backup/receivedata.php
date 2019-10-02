<?php
  session_start();
  include_once('dbcon.php');
  
  // QUERY de execução da busca do ID
  $idp = $_SESSION['idPl'];
  $idSearch = "SELECT id FROM planos WHERE id = '$idp'";
  $exec = mysqli_query($conn, $idSearch);
  $id = mysqli_insert_id();

  // Dados da Solicitação
  $plano = $_SESSION['plano-ativo'];

  // Dados do Titular
  $subId = $_POST['submission_id'];
  $nome = $_POST['nomeCompleto19'];
  $telefone = $_POST['telefone[full]'];
  $email = $_POST['email'];
  $cpf = $_POST['cpf'];

  // Dados dos Dependentes
  $vocePossui = $_POST['vocePossui'];
  $qtdDep = $_POST['quantosDependentes'];
  $dadosDep1 = $_POST['dadosDos8[field_1]']." - ".$_POST['dadosDos8[field_2]']." - ".$_POST['dadosDos8[field_4]'];
  $dadosDep2 = $_POST['dadosDos9[field_1]']." - ".$_POST['dadosDos9[field_2]']." - ".$_POST['dadosDos9[field_4]'];
  $dadosDep3 = $_POST['dadosDos10[field_1]']." - ".$_POST['dadosDos10[field_2]']." - ".$_POST['dadosDos10[field_4]'];
  $dadosDep4 = $_POST['dadosDos11[field_1]']." - ".$_POST['dadosDos11[field_2]']." - ".$_POST['dadosDos11[field_4]'];
  $dadosDep5 = $_POST['dadosDos12[field_1]']." - ".$_POST['dadosDos12[field_2]']." - ".$_POST['dadosDos12[field_4]'];
  $dadosDep6 = $_POST['dadosDos13[field_1]']." - ".$_POST['dadosDos13[field_2]']." - ".$_POST['dadosDos13[field_4]'];
  $dadosDep7 = $_POST['dadosDos14[field_1]']." - ".$_POST['dadosDos14[field_2]']." - ".$_POST['dadosDos14[field_4]'];
  $dadosDep8 = $_POST['dadosDos15[field_1]']." - ".$_POST['dadosDos15[field_2]']." - ".$_POST['dadosDos15[field_4]'];
  $dadosDep9 = $_POST['dadosDos16[field_1]']." - ".$_POST['dadosDos16[field_2]']." - ".$_POST['dadosDos16[field_4]'];
  $dadosDep10 = $_POST['dadosDos17[field_1]']." - ".$_POST['dadosDos17[field_2]']." - ".$_POST['dadosDos17[field_4]'];

  // Dados de Cobrança
  $formaPag = $_POST['formaDe'];

  $sql = "UPDATE planos SET plano = '$plano', nome = '$nome', subID = '$subId', telefone = '$telefone', email = '$email', cpf = '$cpf', possuidep = '$vocePossui', qtddep = '$qtdDep', dadosdep1 = '$dadosDep1', dadosdep2 = '$dadosDep2', dadosdep3 = '$dadosDep3', dadosdep4 = '$dadosDep4', dadosdep5 = '$dadosDep5', dadosdep6 = '$dadosDep6', dadosdep7 = '$dadosDep7', dadosdep8 = '$dadosDep8', dadosdep9 = '$dadosDep9', dadosdep10 = '$dadosDep10', date_cad = 'NOW()' WHERE id = '$id'"; // QUERY de Update dos Dados Coletados pelo FORM

  $result = mysqli_query($conn, $sql); // Execução da QUERY

  $row = mysqli_fetch_assoc($result); // Testa a execução da QUERY

  $_SESSION['client'] = $nome;
  echo "<script> console.log('Generated ID: <?php mysql_insert_id() ?>') </script>";

  if ( $row == 1 && $formaPag == "Boleto Bancário" ){
    echo "<script> console.log('Boleto'); </script>";
  } else if ( $row == 1 && $formaPag == "Cartão de Crédito" ){
    echo "<script> console.log('Cartão'); </script>";
  };

  $conn->close();
  exit;
?>