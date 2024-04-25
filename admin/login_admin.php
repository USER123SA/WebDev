<?php
// connexion base du donnée

include '../config/config.php';


// Vérifier si le formulaire de connexion a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $login = $_POST["login"];
    $mot_de_passe = $_POST["mot_de_passe"];

    // Requête SQL pour récupérer l'administrateur avec le login correspondant
    $sql = "SELECT * FROM `admin` WHERE `login` = '$login'";

    // Exécuter la requête
    $resultat = $db->query($sql);

    // Vérifier si le login existe dans la base de données
    if ($resultat->num_rows > 0) {
        // Récupérer les données de l'administrateur
        $row = $resultat->fetch_assoc();
        
        // Vérifier si le mot de passe correspond
        if ($mot_de_passe === $row["password"]) {
            // Authentification réussie
            echo "Authentification réussie. Bienvenue " . $row["login"];
        } else {
            // Mot de passe incorrect
            echo "Mot de passe incorrect.";
        }
    } else {
        // Login non trouvé dans la base de données
        echo "Login non trouvé.";
    }
}




header("Location: information.php");
      exit;
  
  


?>