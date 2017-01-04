<!DOCTYPE html>
<meta charset="UTF-8">
<!-- déclaration encodage pour les caractères spéciaux -->
<link rel="stylesheet" type="text/css" href="../style/design_table.css">
<html lang="en">
<br>
<a href="../controller/loadBookingController.php" class="buttono">
  <span>Nouvelle réservation</span>
</a>
<head>
  <meta charset="utf-8" />
  <title>Table Style</title>
  <meta name="viewport" content="initial-scale=1.0; maximum-scale=1.0; width=device-width;">
</head>
<br><br><br><br>
<body>

  <form method="post" action="../controller/addResevationController.php">
  <table class="table-fill">
    <thead>
      <tr>
        <th class="title">Liste des réservations</th>
      </tr>
    </thead>
  </table>
  <br><br>
  <table class="table-fill">
    <thead>

      <tr>

        <th class="text-left">ID</th>
        <th class="text-left">Destination</th>
        <th class="text-left">Ass</th>
        <th class="text-left">Noms</th>
        <th class="text-left">Total</th>
        <th class="text-left">Editer</th>
        <th class="text-left">Supprimer</th>

      </tr>
    </thead>
    <tbody class="table-hover">

      <?php if($modelReservation){
      while ($row = $modelReservation->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$row["id"]."</td>";
        echo "<td>".$row["destination"]."</td>";
        echo "<td>".$row["assurance"]."</td>";
        echo "<td>";
        foreach ($people as $pers) {
          if($pers["id"]==$row["id"]){
            echo"<li>".$pers["nom"]." - ".$pers["age"]." ans</li>";
        }
          # code...
        }
        echo "</td>";
        echo "<td>".$row["total"]." €</td>";
        echo "<td class='edit'><a href='../controller/reservationList.php?action=edit&id=".$row["id"]."'>&#128736</a></td>";
        // echo "<td class='edit'><input type='submit' value='&#128736'></td>";
        echo "<td class='delete'><a href='../controller/reservationList.php?action=delete&id=".$row["id"]."'>&#10006</a></td>";
        // echo "<td class='delete'>&#10006--&#128736</td>";
        // foreach (unserialize($value["Personnes"]) as $element) {
        //   echo "<li>".$element[0]." - ".$element[1]." ans</li>";
        // }
        echo "</td>";
        // echo "<td><a href='/tw/reservation?action=edit&id=".$value["ID"]."'>Editer</a></td>";
        // echo "<td><a href='/tw/reservation?action=delete&id=".$value["ID"]."'>Supprimer</a></td>";
        echo "</tr>";
      }
      $modelReservation->free();
    }
      ?>
      <!-- <tr>
        <td class="text-left">January</td>

      </tr>
      <tr>
        <td class="text-left">February</td>
        <td class="text-left">$ 10,000.00</td>
      </tr>
      <tr>
        <td class="text-left">March</td>
        <td class="text-left">$ 85,000.00</td>
      </tr>
      <tr>
        <td class="text-left">April</td>
        <td class="text-left">$ 56,000.00</td>
      </tr>
      <tr>
        <td class="text-left">May</td>
        <td class="text-left">$ 98,000.00</td>
      </tr> -->
    </tbody>
  </table>
</form>

</body>
