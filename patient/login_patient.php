<?php
session_start();
// Connexion à la base de données
include '../config/config.php';


// Vérifier si le formulaire de connexion a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $email = $_POST["email"];
    $mot_de_passe = $_POST["password"];

    // Requête SQL pour récupérer le patient avec l'e-mail correspondant
    $sql = "SELECT * FROM `patient` WHERE `email_pat` = '$email'";

    // Exécuter la requête
    $resultat = $db->query($sql);

    // Vérifier si l'e-mail existe dans la base de données
    if ($resultat->num_rows > 0) {
        // Récupérer les données du patient
        $row = $resultat->fetch_assoc();
        
        // Vérifier si le mot de passe correspond
        if ($mot_de_passe === $row["mot_de_passe_pat"]) {
            // Authentification réussie
            // Vous pouvez rediriger l'utilisateur vers une page sécurisée ou afficher un message de bienvenue ici
            header('Location:liste_rdv.php');
        } else {
            // Mot de passe incorrect
            echo "Mot de passe incorrect.";
        }
    } else {
        // E-mail non trouvé dans la base de données
        echo "Adresse e-mail non trouvée.";
    }
}

// Fermer la connexion
$db->close();
?>
