<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gestion RDV</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="../home.php">Gestion RDV</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="takedate.php">Ajouter RDV</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="liste_rdv.php">Lister RDV</a>
      </li>     
     
 
    <form class="form-inline my-2 my-lg-0">
    
      
      <li class="nav-item dropdown right">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?php 
          include '../config/config.php';
          $sql="select * from patient";
          $result=mysqli_query($db,$sql);
          $row=mysqli_fetch_array($result);
          echo $row['nom_pat']; ?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="editprofile.php?id='<?php echo $row['idpatient'];?>'">Modifier Profile</a>
          <a class="dropdown-item" href="logout.php">Déconnexion</a>
          
        </div>
      </li>
      
    </ul>
      
    </form>
  </div>
</nav>

<br>
<br>
<?php
    require_once "../config/config.php";
    // Préparer la requête SQL pour sélectionner les rendez-vous du patient
    $sql = "SELECT * from rendez_vous";

    // Exécuter la requête SQL
    $result = mysqli_query($db, $sql);

    if($result){
        // Afficher les rendez-vous du patient
        echo "<table class='table'>";
        echo "<tr>";
        echo "<th>ID RDV</th>";
        echo "<th>Date RDV</th>";
        //echo "<th>Heure RDV</th>";
        echo "<th>État RDV</th>";
       

        echo "</tr>";

        while($row2 = mysqli_fetch_assoc($result)){
            echo "<tr>";
            echo "<td>" . $row2['id_rdv'] . "</td>";
            echo "<td>" . $row2['date_RDV'] . "</td>";
           // echo "<td>" . $row['heure_RDV'] . "</td>";
            echo "<td>" . $row2['etat_rdv'] . "</td>";
           
            echo "</tr>";
        }
        echo "</table>";

    }
?>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
