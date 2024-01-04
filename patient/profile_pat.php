<?php

extract($_POST);
mysql_connect('localhost','root','');
mysql_select_db('render_vousdb');



session_start();
//verifier la connexion
if (!isset($_SESSION['pat_email'])) {
        header('Location: login.html');
        exit;
    }


$em = $_SESSION['pat_email'];


//modifier un profile  de patient

if (isset($_POST['modifier'])) {
    

    $req="UPDATE patient SET nom='$T1',prenom='$T2',email='$T3',password='$T4' WHERE email='$em';";
    $res=mysql_query($req) or die("problem 1");
    header("Location: editprofile-info-saved.php");
      exit;
    
    
    }
    //supprimer un profile de patient
    
    if (isset($_POST['supprimer'])) {
    
    $req="DELETE from patient WHERE email='$em';";
    $res=mysql_query($req) or die("problem ");
    //echo"profile supprimer avec succee ";
    header("Location: login.html");
    
    }
    
    
    
   


?>