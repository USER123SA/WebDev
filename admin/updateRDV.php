<?php
// Inclusion du fichier de configuration de la base de données
require_once "../config/config.php";

// Définition des variables et initialisation avec des valeurs vides
$date_RDV = $heure_RDV = $etat_rdv = "";
$id_rdv = "";

// Traitement du formulaire lorsque le formulaire est soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validation de l'identifiant du rendez-vous
    $id_rdv = trim($_POST["id_rdv"]);

    // Validation de la date du rendez-vous
    $date_RDV = trim($_POST["date_RDV"]);

    // Validation de l'heure du rendez-vous
    $heure_RDV = trim($_POST["heure_RDV"]);

    // Validation de l'état du rendez-vous
    $etat_rdv = trim($_POST["etat_rdv"]);

    // Vérification des erreurs de saisie avant la mise à jour des données dans la base de données
    if (!empty($date_RDV) && !empty($heure_RDV) && !empty($etat_rdv)) {
        // Préparation de la requête SQL pour la mise à jour du rendez-vous
        $sql = "UPDATE rendez_vous SET date_RDV='$date_RDV', heure_RDV='$heure_RDV', etat_rdv='$etat_rdv' WHERE id_rdv=$id_rdv";

        // Exécution de la requête SQL
        if (mysqli_query($db, $sql)) {
            // Redirection vers la page de liste des rendez-vous après la mise à jour
            header("location: liste_rdv.php");
            exit();
        } else {
            echo "Oops! Une erreur s'est produite. Veuillez réessayer ultérieurement.";
        }
    }

    // Fermeture de la connexion à la base de données
    mysqli_close($db);
} else {
    // Redirection vers une page d'erreur si le formulaire n'est pas soumis
    header("location: erreur.php");
    exit();
}
?>
