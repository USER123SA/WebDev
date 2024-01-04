<?
extract($_POST);
mysql_connect('localhost','root','');
mysql_select_db('render_vousdb');


session_start();
if (!isset($_SESSION['med_email'])) {
        header('Location: login.html');
        exit;
    }



//extraire lemail de personne actuel
$em = $_SESSION['med_email'];


//modifier son profile

if(isset($_POST['modifier'])) 
{

$id="select id from medecin where nom='$T1';";
$id1=mysql_query($id) or die("problem1 ");

$req="UPDATE medecin SET nom='$T1',prenom='$T2',email ='$T3',password ='$T4',adress='$T5',specialite='$T6',description='$T7',dateDisp='$T8' WHERE email='$em';";
$res=mysql_query($req) or die("problem2 ");
//echo"le profile a éte changee avec succee";
header("Location: editprofile-info-saved.php");
      exit;

}






//suppression son profile 
if(isset($_POST['supprimer'])) 
{
$req="DELETE FROM medecin WHERE email='$em';";

$res=mysql_query($req) or die("problem ");

//echo "le profile est supprime apres une confirmation d'admin";

header("Location: login.html");

}


?>