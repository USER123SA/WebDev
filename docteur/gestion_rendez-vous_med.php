<?php
// Inclure le fichier de configuration de la base de données
require_once "../config/config.php";



//$id_medecin = $_POST["idmedecin"];

// Récupérer la liste des patients avec des rendez-vous
$req="SELECT 
m.*, 
p.*, 
r.*
FROM 
rendez_vous r
INNER JOIN 
médecin m ON r.id_medecin = m.idmedecin
INNER JOIN 
patient p ON r.id_patient = p.idpatient";
$result=mysqli_query($db,$req);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Médecin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
 
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
      <a class="navbar-brand fs-3 fw-bold" href="information.php">Gestion_RDV</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
        aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse " id="navbarNavDropdown">
        <ul class="navbar-nav ms-auto fs-5">
         
          <li class="nav-item">
            <a class="nav-link" href="logout.php">Logout</a>
          </li>
        </ul>
      </div>
     
</div>
</nav>
<br>
<br>
    <div class="container">
       
        <h3>Liste des patients avec rendez-vous</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>ID Patient</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                    <tr>
                        <td><?php echo $row['id_patient']; ?></td>
                        <td><?php echo $row['nom_pat']; ?></td>
                        <td><?php echo $row['prenom_pat']; ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

        <h3>Liste des rendez-vous</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>ID Rendez-vous</th>
                    <th>ID Patient</th>
                    <th>Date RDV</th>
                    <th>Heure RDV</th>
                    <th>État</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql_rdv = "SELECT * FROM rendez_vous";
                $result_rdv = mysqli_query($db, $sql_rdv);
                while ($row_rdv = mysqli_fetch_assoc($result_rdv)) : ?>
                    <tr>
                        <td><?php echo $row_rdv['id_rdv']; ?></td>
                        <td><?php echo $row_rdv['id_patient']; ?></td>
                        <td><?php echo $row_rdv['date_RDV']; ?></td>
                        <td><?php echo $row_rdv['heure_RDV']; ?></td>
                        <td>?</td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
