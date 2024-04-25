
<?php
// connexion base du donnée

include '../config/config.php';


// Vérifier si le formulaire de connexion a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $email = $_POST["T3"];
    $mot_de_passe = $_POST["T4"];

    // Requête SQL pour récupérer l'administrateur avec le login correspondant
    $sql = "SELECT * FROM `médecin` WHERE `email_med` = '$email'";

    // Exécuter la requête
    $resultat = $db->query($sql);

    // Vérifier si le login existe dans la base de données
    if ($resultat->num_rows > 0) {
        // Récupérer les données de l'administrateur
        $row = $resultat->fetch_assoc();
        
        // Vérifier si le mot de passe correspond
        if ($mot_de_passe === $row["mot_de_passe_med"]) {
            // Authentification réussie
            echo "Authentification réussie. Bienvenue " . $row["nom_med"];
        } else {
            // Mot de passe incorrect
            echo "Mot de passe incorrect.";
        }
    } else {
        // Login non trouvé dans la base de données
        echo "Login non trouvé.";
    }
}




header("Location: gestion_rendez-vous_med.php");
      exit;
  
  


?>