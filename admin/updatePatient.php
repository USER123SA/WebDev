<?php
// Inclure le fichier de configuration de la base de données
require_once "../config/config.php";

// Initialiser les variables et récupérer les données du formulaire
$id = $_POST["id"];
$nom_pat = $_POST["nom_pat"];
$prenom_pat = $_POST["prenom_pat"];
$sexe = $_POST["sexe"];
$tel_pat = $_POST["tel_pat"];
$email_pat = $_POST["email_pat"];
$date_nais = $_POST["date_naissance"];

// Préparer la requête SQL de mise à jour
$sql = "UPDATE patient SET nom_pat='$nom_pat', prenom_pat='$prenom_pat', sexe='$sexe', tel_pat='$tel_pat', email_pat='$email_pat', date_naissance='$date_nais' WHERE idpatient=$id";

// Exécuter la requête de mise à jour
if(mysqli_query($db, $sql)){
    // Rediriger vers la page des patients après la mise à jour
    header("location: information.php");
    exit();
} else{
    echo "Erreur : " . mysqli_error($db);
}

// Fermer la connexion à la base de données
mysqli_close($mysqli);
?>
