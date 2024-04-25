<?php
session_start();
include '../config/config.php';
$req="SELECT 
m.*, 
p.*, 
r.*
FROM 
rendez_vous r
INNER JOIN 
médecin m ON r.id_medecin = m.idmedecin
INNER JOIN 
patient p ON r.id_patient = p.idpatient";
$result=mysqli_query($db,$req);
//var_dump($result);




// Vérifiez si le formulaire d'ajout de rendez-vous a été soumis
if (isset($_POST['ajouter_rdv'])) {
    // Récupérez les données du formulaire
    $nom_medecin = $_POST['T1'];
    $sql="select * from médecin where nom_med='$nom_medecin'";
    $result=mysqli_query($db,$sql);
    $row=mysqli_fetch_array($result);
    $idmed=$row['idmedecin'];
    $date_rdv = $_POST['T2'];
    $heure_rdv = $_POST['T3'];

    // Vous devriez valider et nettoyer les données d'entrée pour éviter les attaques par injection SQL

    // Exécutez la requête pour ajouter le rendez-vous à la base de données
    $sql = "INSERT INTO rendez_vous (id_medecin, date_RDV, heure_RDV) VALUES ('$idmed', '$date_rdv', '$heure_rdv')";
    
    if (mysqli_query($db, $sql)) {
        // Rediriger vers une page de confirmation ou afficher un message de succès
        header('Location: confirmation.php');
        exit;
    } else {
        // Gérer l'erreur de la requête SQL
        echo "Erreur lors de l'ajout du rendez-vous : " . mysqli_error($db);
    }

    // Fermer la connexion à la base de données
    mysqli_close($db);
}
?>
