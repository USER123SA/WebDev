<?php
// Inclure le fichier de configuration de la base de données
require_once "../config/config.php";


// Vérifier si l'identifiant du médecin est présent dans l'URL
if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
    // Récupérer l'identifiant du médecin depuis l'URL
    $id = trim($_GET["id"]);


    // Préparer la requête SQL de suppression
    $sql = "DELETE FROM médecin WHERE idmedecin = $id";

    // Exécuter la requête SQL de suppression
    if(mysqli_query($db, $sql)){
        // Rediriger vers la page des médecins après la suppression
       
        header("location: information.php");
        exit();
    } else{
        echo "Erreur : " . mysqli_error($db);
    }
}
?>