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
        echo "<td>".$row["id_reservation"]."</td>";
        echo "<td>".$row["destination"]."</td>";
        echo "<td>".$row["assurance"]."</td>";
        echo "<td>";

            echo"<li>name:".$row["name"]."</li><li>age:".$row["age"]." ans</li>";


        echo "</td>";
        echo "<td>".$row["total"]." €</td>";
        echo "<td class='edit'><a href='../controller/reservationList.php?action=edit&id=".$row["id_reservation"]."'>&#128736</a></td>"; //button to edit
        echo "<td class='delete'><a href='../controller/reservationList.php?action=delete&id=".$row["id_reservation"]."'>&#10006</a></td>"; //button to delete

        echo "</td>";
        echo "</tr>";
      }
      $modelReservation->free();
    }
      ?>

    </tbody>
  </table>
</form>

</body>
