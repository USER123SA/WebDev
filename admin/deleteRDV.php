<?php
// Inclusion du fichier de configuration de la base de données
require_once "../config/config.php";

// Vérifier si l'identifiant du rendez-vous est présent dans l'URL
if(isset($_GET["id_rdv"]) && !empty(trim($_GET["id_rdv"]))){
    // Récupérer l'identifiant du rendez-vous depuis l'URL
    $id_rdv = trim($_GET["id_rdv"]);

    // Préparer la requête SQL de suppression
    $sql = "DELETE FROM rendez_vous WHERE id_rdv = $id_rdv";

    // Exécuter la requête SQL de suppression
    if(mysqli_query($db, $sql)){
        // Rediriger vers la page de liste des rendez-vous après la suppression
        header("location: information.php");
        exit();
    } else{
        echo "Erreur : " . mysqli_error($db);
    }
}

// Fermer la connexion à la base de données
mysqli_close($db);
?>
