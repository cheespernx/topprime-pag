<?php 
  session_start();
  include_once('dbcon.php');
  $id = $_SESSION['idPl'];
  $name = $_SESSION['client'];
  echo "<script> console.log('Generated ID: <?php echo $id ?> ') </script>"
  echo "<script> console.log('Client Name: <?php echo $name ?>') </script>"

  $sql = "SELECT * FROM planos WHERE id = '$id'"
  $query = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($query);

  if($query['formaPag'] === 'Cartão de Crédito' && $query['plano'] === 'amil-dental'){
    header('Location: https://form.jotformz.com/92604479701662');
  }

?>