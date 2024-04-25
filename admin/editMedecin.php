<?php
// Inclusion du fichier de configuration de la base de données
require_once "../config/config.php";

// Définition des variables et initialisation avec des valeurs vides
$id_medecin = $nom_med = $email_med = $mot_passe_med = "";
$nom_med_err = $email_med_err = $mot_passe_med_err = "";
// Vérifier si l'identifiant du médecin est présent dans l'URL
if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
    // Récupérer l'identifiant du médecin depuis l'URL
    $id = trim($_GET["id"]);

    // Préparer la requête SQL de sélection
    $sql = "SELECT * FROM médecin WHERE idmedecin = $id";

    // Exécuter la requête SQL
    $result = mysqli_query($db, $sql);

    if ($result) {
        // Vérifier s'il y a des données retournées
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            // Récupérer les données du médecin
            $id_medecin = $row["idmedecin"];
            $nom_med = $row["nom_med"];
           
            $email_med = $row["email_med"];
            $mot_de_passe = $row["mot_de_passe_med"];
        } else {
            // Rediriger vers la page d'erreur si l'identifiant du médecin n'existe pas
            header("location: error.php");
            exit();
        }
    } else {
        echo "Erreur : " . mysqli_error($mysqli);
    }

    // Fermer la connexion à la base de données
    mysqli_close($db);
} else {
    // Rediriger vers la page d'erreur si aucun identifiant de médecin n'est fourni dans l'URL
    header("location: error.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Médecin</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper {
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Modifier Médecin</h2>
        <p>Modifier les informations du médecin.</p>
        <form action="updateMedecin.php" method="post">
            <div class="form-group">
            <input type="hidden" name="id_medecin" value="<?php echo $id_medecin; ?>">
                <label>Nom du Médecin</label>
                <input type="text" name="nom_med" class="form-control <?php echo (!empty($nom_med_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $nom_med; ?>">
                <span class="invalid-feedback"><?php echo $nom_med_err; ?></span>
            </div>
            <div class="form-group">
                <label>E-mail du Médecin</label>
                <input type="email" name="email_med" class="form-control <?php echo (!empty($email_med_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email_med; ?>">
                <span class="invalid-feedback"><?php echo $email_med_err; ?></span>
            </div>
            <div class="form-group">
                <label>Mot de Passe du Médecin</label>
                <input type="password" name="mot_de_passe_med" class="form-control <?php echo (!empty($mot_passe_med_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $mot_de_passe; ?>">
                <span class="invalid-feedback"><?php echo $mot_passe_med_err; ?></span>
            </div>
           
            <input type="submit" class="btn btn-primary" value="Modifier">
            <a href="information.php" class="btn btn-secondary ml-2">Annuler</a>
        </form>
    </div>    
</body>
</html>
