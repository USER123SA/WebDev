<?
session_start();

//connexin a la base:
include '../config/config.php';


// Vérification de l'état de connexion de l'administrateur
    
    if (!isset($_SESSION['id'])) {
        header('Location: login.html');
        exit;
    }
?>