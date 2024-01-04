<?php

extract($_POST);

 mysql_connect("localhost","root","");
 mysql_select_db("render_vousdb");


//verifier si le session est ouvert ou non 
session_start();
if (!isset($_SESSION['pat_email'])) {
        header('Location: login.html');
        exit;
    }



// Reservé d'un rendez-vous par un patient

if (isset($_POST['ajouter_rdv'])) {

    $id_patient = $_SESSION['pat_id'];



//verifier si le nom et la specialiter existe 

$req3="select * from medecin where ((nom='$T2') and (specialite='$T1'));";
        $res3= mysql_query($req3) or die(mysql_error());
        if (mysql_num_rows($res3) == 0) {
        echo "<script>
                alert('nom ou specialiter incorrecte');
                window.location.href = 'takedate.php';
            </script>";

    }else {


    $rr = mysql_fetch_array($res3); 

// extraire l id de cette medecin

$id_medecin=$rr['id'];
    // Vérification de la disponibilité du médecin
    $req = "SELECT * FROM rdv WHERE ((idMedecin = '$id_medecin') AND (date_rdv = '$T3') AND (heure_rdv = '$T4'));";
    $res = mysql_query($req) or die(mysql_error());

    if (mysql_num_rows($res) != 0) {

        $error="Le médecin n'est pas disponible à ce moment-là. Veuillez choisir une autre heure.";

        echo "<script>
                alert('$error');
                window.location.href = 'takedate.php';
            </script>";

    } else {



        mysql_query("INSERT INTO rdv(idMedecin, idPatient, date_rdv, heure_rdv) VALUES ('$id_medecin', '$id_patient', '$T3', '$T4');") or die(mysql_error());
//echo "Rendez-vous enregistré avec succès!";

header("Location: liste_rdv.php");
      exit;

    }
}}



    ?>