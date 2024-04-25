<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
    integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
    crossorigin="anonymous"></script>

</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
      <a class="navbar-brand fs-3 fw-bold" href="information.php">HomePage</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
        aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse " id="navbarNavDropdown">
        <ul class="navbar-nav ms-auto fs-5">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="medecin.php">Médecins_listes</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="patients.php">Patients_listes</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="liste_rdv.php">Rendez_vous</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout.php">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <br><br><br>
<div class="container">
  <h2 style="text-align:center">Liste des RDV</h2>
  <a href="" class="btn btn-primary">Nouveau Rendez-vous</a>
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
        echo "<th>Actions</th>";

        echo "</tr>";

        while($row2 = mysqli_fetch_assoc($result)){
            echo "<tr>";
            echo "<td>" . $row2['id_rdv'] . "</td>";
            echo "<td>" . $row2['date_RDV'] . "</td>";
           // echo "<td>" . $row['heure_RDV'] . "</td>";
            echo "<td>" . $row2['etat_rdv'] . "</td>";
            echo "<td>";
            echo "<a href='editRDV.php?id=" .$row2['id_rdv'] . "' class='btn btn-warning'>Modifier</a>"; 
            echo "<a href='deleteRDV.php?id=" . $row2['id_rdv'] . "' class='btn btn-danger' >Supprimer</a>";
            echo "</td>";
            echo "</tr>";
        }
        echo "</table>";

    }
?>

</div>

</body>

</html>
