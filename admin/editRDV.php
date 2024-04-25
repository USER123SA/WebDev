<?php
// Inclusion du fichier de configuration de la base de données
require_once "../config/config.php";

// Vérification si l'identifiant du rendez-vous est présent dans l'URL
if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
    // Récupération de l'identifiant du rendez-vous depuis l'URL
    $id = trim($_GET["id"]);

    // Préparation de la requête SQL pour sélectionner les détails du rendez-vous
    $sql = "SELECT * FROM rendez_vous WHERE id_rdv = ?";

    if($stmt = mysqli_prepare($db, $sql)){
        // Liaison des variables à la déclaration préparée en tant que paramètres
        mysqli_stmt_bind_param($stmt, "i", $param_id);

        // Définition des paramètres
        $param_id = $id;

        // Tentative d'exécution de la déclaration préparée
        if(mysqli_stmt_execute($stmt)){
            // Récupération du résultat
            $result = mysqli_stmt_get_result($stmt);

            if(mysqli_num_rows($result) == 1){
                // Récupération de la ligne de résultat sous forme de tableau associatif
                $row = mysqli_fetch_assoc($result);

                // Affichage du formulaire de modification du rendez-vous
                ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit RDV</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Modifier RDV</h2>
        <form action="updateRDV.php" method="post">
            <div class="form-group">
                <label>Date RDV</label>
                <input type="date" name="date_RDV" class="form-control" value="<?php echo $row['date_RDV']; ?>">
            </div>
            <div class="form-group">
                <label>Heure RDV</label>
                <input type="time" name="heure_RDV" class="form-control" value="<?php echo $row['heure_RDV']; ?>">
            </div>
            <div class="form-group">
                <label>État RDV</label>
                <input type="text" name="etat_rdv" class="form-control" value="<?php echo $row['etat_rdv']; ?>">
            </div>
            <input type="hidden" name="id_rdv" value="<?php echo $row['id_rdv']; ?>">
            <input type="submit" class="btn btn-primary" value="Save">
            <a href="liste_rdv.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</body>
</html>
<?php
            } else{
                // Affichage d'un message si l'identifiant du rendez-vous n'est pas valide
                echo "Invalid RDV ID.";
            }
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }

    // Fermeture de la déclaration
    mysqli_stmt_close($stmt);

    // Fermeture de la connexion à la base de données
    mysqli_close($db);
} else{
    // Redirection vers une page d'erreur si l'identifiant du rendez-vous n'est pas spécifié dans l'URL
    header("location: erreur.php");
    exit();
}
?>
