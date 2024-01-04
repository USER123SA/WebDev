<?

extract($_POST);

 mysql_connect("localhost","root","");
 mysql_select_db("rendez_vousdb");



session_start();
if (!isset($_SESSION['med_email'])) {
        header('Location: login.html');
        exit;
    }

//enregistrer un rendez_vous pour un patient

if (isset($_POST['ajouter_rdv'])) {
  $req ="INSERT INTO rdv(idMedecin, idPatient, date_rdv, heure_rdv) VALUES ($id_medecin, $id_patient, '$date_rdv', '$heure_rdv');";

  $res = mysql_query($req) or die(mysql_error());

}


//annuler un rendez-vous


    if (isset($_POST['annuler_rdv'])) {
$id_rdv = $T1;

$req1= "DELETE FROM rdv WHERE idRdv= $id_rdv;";
$res1= mysql_query($req1) or die(mysql_error());

echo "Aprés une verification de l'admin Le rendez-vous sera annulé !"; 
}


//modifier un rendez-vous

if (isset($_POST['modifier_rdv'])) {
    $id_rdv = $_POST['id_rdv'];
    $nouvelle_date = $_POST['nouvelle_date'];
    $nouvelle_heure = $_POST['nouvelle_heure'];

    $req2= "UPDATE rdv SET date_rdv = '$nouvelle_date', heure_rdv = '$nouvelle_heure' WHERE id = $id_rdv";
    $res2= mysql_query($req2) or die(mysql_error());

    echo "Le rendez-vous a été modifié avec succès.";
}




//afficher les rendez-vous des patients pour le medecin actuel


if (isset($_POST['afficher_rdv_medecin'])) {
    $id_medecin = $_POST['id_medecin'];

    $req3= "SELECT rdv.id, patient.nom, patient.prenom, rdv.date_rdv, rdv.heure_rdv
            FROM rdv
            INNER JOIN patient ON rdv.idPatient = patient.id
            WHERE idMedecin = $id_medecin
            ORDER BY rdv.date_rdv ASC, rdv.heure_rdv ASC";

    $res3= mysql_query($req3) or die(mysql_error());

    if (mysql_num_rows($res3) == 0) {
        echo "Aucun rendez-vous trouvé pour ce médecin.";
        }

?>