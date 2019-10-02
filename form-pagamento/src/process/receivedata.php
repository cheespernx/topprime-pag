<?php
  session_start();

  $submissionData = @$_POST;

  if (! isset($submissionData["submission_id"])){
    die("Invalid submission data! 'submission_id' not exists.");
  }

  $subId = $_POST['submission_id'];
  $formId = $_POST['formID'];
  $ip = $_POST['ip'];
  $nome = $_POST['nomecompleto19'];
  $telefone = $_POST['telefone']['0'];
  $email = $_POST['email'];
  $cpf = $_POST['cpf'];
  $vocePossui = $_POST['vocepossui'];
  $qtdDep = $_POST['quantosdependentes'];
  $dadosDep1 = $_POST['dadosdos8']['0'].$_POST['dadosdos8']['1'].$_POST['dadosdos8']['2'];
  $dadosDep2 = $_POST['dadosdos9']['0'].$_POST['dadosdos9']['1'].$_POST['dadosdos9']['2'];
  $dadosDep3 = $_POST['dadosdos10']['0'].$_POST['dadosdos10']['1'].$_POST['dadosdos10']['2'];
  $dadosDep4 = $_POST['dadosdos11']['0'].$_POST['dadosdos11']['1'].$_POST['dadosdos11']['2'];
  $dadosDep5 = $_POST['dadosdos12']['0'].$_POST['dadosdos12']['1'].$_POST['dadosdos12']['2'];
  $dadosDep6 = $_POST['dadosdos13']['0'].$_POST['dadosdos13']['1'].$_POST['dadosdos13']['2'];
  $dadosDep7 = $_POST['dadosdos14']['0'].$_POST['dadosdos14']['1'].$_POST['dadosdos14']['2'];
  $dadosDep8 = $_POST['dadosdos15']['0'].$_POST['dadosdos15']['1'].$_POST['dadosdos15']['2'];
  $dadosDep9 = $_POST['dadosdos16']['0'].$_POST['dadosdos16']['1'].$_POST['dadosdos16']['2'];
  $dadosDep11 = $_POST['dadosdos17']['0'].$_POST['dadosdos17']['1'].$_POST['dadosdos17']['2'];
  $formaPag = $_POST['formade'];

  // Database connection
  $db_host = 'sql170.main-hosting.eu';
  $db_username = 'u668533246_odon';
  $db_password = 'aw96b6k13751';
  $db_name = 'u668533246_odon';
  mysql_connect( $db_host, $db_username, $db_password ) or die (mysql_error());
  mysql_select_db($db_name);

  $query = "SELECT * FROM `planos` WHERE `submission_id` = '".$submissionData["submission_id"]."'";
  $sqlsearch = mysqli_query($query);
  $resultcont = mysqli_numrows($sqlsearch);

  if($resultcont > 0) {
    mysqli_query("UPDATE `planos` SET nome = '$nome', submissionID = '$subId', formID = '$formID', telefone = '$telefone', email = '$email', cpf = '$cpf', possuidep = '$vocePossui', qtddep = '$qtdDep', dadosdep1 = '$dadosDep1', dadosdep2 = '$dadosDep2', dadosdep3 = '$dadosDep3', dadosdep4 = '$dadosDep4', dadosdep5 = '$dadosDep5', dadosdep6 = '$dadosDep6', dadosdep7 = '$dadosDep7', dadosdep8 = '$dadosDep8', dadosdep9 = '$dadosDep9', dadosdep10 = '$dadosDep10', date_cad = 'NOW()' WHERE `submission_id` = '$submission_id'") or die (mysqli_error());
  } else {
    mysqli_query("INSERT INTO planos (nome, submission_id, form_ID, telefone, email, cpf, possuidep, qtddep, dadosdep1, dadosdep2, dadosdep3, dadosdep4, dadosdep5, dadosdep6, dadosdep7, dadosdep8, dadosdep9, dadosdep10, formaPag, date_cad) VALUES ($nome, $submission_id, $formID, $telefone, $email, $cpf, $vocePossui, $qtdDep, $dadosDep1, $dadosDep2, $dadosDep3, $dadosDep4, $dadosDep5, $dadosDep6, $dadosDep7, $dadosDep8, $dadosDep9, $dadosDep10, $formaPag, NOW()") or die (mysqli_error());
  }

 /*
  $result = mysqli_query($conn, $sql); // Execução da QUERY

  $row = mysqli_fetch_assoc($result); // Testa a execução da QUERY

  $_SESSION['client'] = $nome;
  echo "<script> console.log('Generated ID: <?php mysql_insert_id() ?>') </script>";
 */
  if ( $formaPag == "Boleto Bancário" ){
    echo "<script> console.log('Boleto'); </script>";
  } else if ( $formaPag == "Cartão de Crédito" ){
    echo "<script> console.log('Cartão'); </script>";
  };

  exit;
?>