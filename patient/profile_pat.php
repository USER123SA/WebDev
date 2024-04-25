<?php



session_start();
include '../config/config.php';
//verifier la connexion



//$em = $_GET['id'];


//modifier un profile  de patient

if (isset($_POST['modifier'])) {
    

    $req="UPDATE patient SET nom='$T1',prenom='$T2',email='$T3',password='$T4' ";
    $res=mysqli_query($db,$req) or die("problem 1");
    header("Location: editprofile-info-saved.php");
      exit;
    
    
    }
    //supprimer un profile de patient
    
    if (isset($_POST['supprimer'])) {
    
    $req="DELETE from patient WHERE email='$em';";
    $res=mysqli_query($db,$req) or die("problem ");
    //echo"profile supprimer avec succee ";
    header("Location: login.html");
    
    }
    
    
    
   


?>