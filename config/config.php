<?php
// how to connect to the database
$db = new mysqli('localhost', 'root', '', 'rdv');
// Vérifier la connexion
if ($db->connect_error) {
    die("Connexion échouée : " . $connexion->connect_error);
}
?>