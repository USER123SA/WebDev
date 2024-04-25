<?php
// Inclure le fichier de configuration de la base de données
require_once "../config/config.php";

// Vérifier si l'identifiant du patient est présent dans l'URL
if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
    // Récupérer l'identifiant du patient depuis l'URL
    $id = trim($_GET["id"]);

    // Préparer la requête SQL de suppression
    $sql = "DELETE FROM patient WHERE idpatient = $id";

    // Exécuter la requête SQL de suppression
    if(mysqli_query($db, $sql)){
        // Rediriger vers la page des patients après la suppression
       
        header("location: information.php");
        exit();
    } else{
        echo "Erreur : " . mysqli_error($db);
    }
}

// Fermer la connexion à la base de données
mysqli_close($db);
?>
