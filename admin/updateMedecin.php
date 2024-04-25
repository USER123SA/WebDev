<?php
// Inclure le fichier de configuration de la base de données
require_once "../config/config.php";

// Initialiser les variables et récupérer les données du formulaire
$id_medecin = $_POST["id_medecin"];
echo $id_medecin;
$nom_med = $_POST["nom_med"];
$email_med = $_POST["email_med"];
$mot_passe_med = $_POST["mot_de_passe_med"];
$sql= "UPDATE médecin SET nom_med='$nom_med', email_med='$email_med', mot_de_passe_med='$mot_passe_med' WHERE idmedecin='$id_medecin'";
if(mysqli_query($db,$sql)){
    header("location:information.php");
}else echo "Error: " . $sql . "<br>" . mysqli_error($db);

// Fermer la connexion à la base de données
mysqli_close($db);
?>
