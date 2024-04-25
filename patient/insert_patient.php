<?php
// Vérifiez si le formulaire a été soumis
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Vérifiez si toutes les données ont été envoyées
    if(isset($_POST["T1"]) && isset($_POST["T2"]) && isset($_POST["T3"]) && isset($_POST["T4"]) && isset($_POST["T5"])){
        // Inclure le fichier de configuration de la base de données
        require_once "../config/config.php";
        
        // Récupérer les données du formulaire
        $first_name = $_POST["T1"];
        $last_name = $_POST["T2"];
        $email = $_POST["T3"];
        $password = $_POST["T4"];
        $phone_number = $_POST["T5"];
        $sexe=$_POST["T6"];
        $date=$_POST["T7"];
        
        
        // Préparer la requête d'insertion
        $sql = "INSERT INTO `patient`( `nom_pat`, `prenom_pat`, `sexe`, `tel_pat`, `email_pat`, `mot_de_passe_pat`, `date_naissance`)
         VALUES ('$first_name', '$last_name', '$sexe','$phone_number','$email', '$password', '$date')";
        
        // Exécuter la requête
        if(mysqli_query($db, $sql)){
            // Rediriger l'utilisateur vers une autre page après l'inscription
            header("location: login.html");
            exit;
        } else{
            echo "Une erreur s'est produite lors de l'inscription. Veuillez réessayer plus tard.";
        }
        
        // Fermer la connexion à la base de données
        mysqli_close($db);
    } else{
        echo "Tous les champs du formulaire doivent être remplis.";
    }
}
?>
