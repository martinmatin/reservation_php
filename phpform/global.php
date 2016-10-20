<?php
if (isset($_POST['reservation'])) {

  $destination = $_POST['destination'];
  $nombre_place = $_POST['nombre_place'];
  if(isset($_POST['check_assurance'])){
    $check_assurance = $_POST['check_assurance'];
  }
  else{$check_assurance=0;}


  print("<center>Bjr $destination $nombre_place $check_assurance</center>");
    // echo "<script>window.location = 'view/form_detail.php'</script>";
}



 ?>
