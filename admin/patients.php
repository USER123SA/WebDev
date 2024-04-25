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
  <br>
  <br>
  <br>
<div class="container">
  <h2 style="text-align:center">Liste des patients</h2>
  <a href="../patient/register.html" class="btn btn-primary">Nouveau Patient</a>
  <?php
// Inclure le fichier de configuration de la base de données
require_once "../config/config.php";

// Récupérer la liste des patients depuis la base de données
$sql = "SELECT * FROM patient";
$result = mysqli_query($db, $sql);

// Vérifier s'il y a des patients dans la base de données
if (mysqli_num_rows($result) > 0) {
    echo "<table class='table'>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>ID</th>";
    echo "<th>Nom</th>";
    echo "<th>Prénom</th>";
    echo "<th>Sexe</th>";
    echo "<th>Numéro de téléphone</th>";
    echo "<th>E-mail</th>";
    echo "<th>Date de naissance</th>";
    echo "<th>Action</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";

    // Afficher les données des patients
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['idpatient'] . "</td>";
        echo "<td>" . $row['nom_pat'] . "</td>";
        echo "<td>" . $row['prenom_pat'] . "</td>";
        echo "<td>" . $row['sexe'] . "</td>";
        echo "<td>" . $row['tel_pat'] . "</td>";
        echo "<td>" . $row['email_pat'] . "</td>";
        echo "<td>" . $row['date_naissance'] . "</td>";
        echo "<td>";
        echo "<a href='editPatient.php?id=" . $row['idpatient'] . "' class='btn btn-warning'>Modifier</a>";
        echo "<a href='deletePatient.php?id=" . $row['idpatient'] . "' class='btn btn-danger'>Supprimer</a>";
        echo "</td>";
        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
} else {
    echo "Aucun patient trouvé.";
}


//mysqli_close($db);
?>
</div>

</body>

</html>
