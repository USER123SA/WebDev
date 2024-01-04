<?

session_start();



//connexin a la base:
extract($_POST);
mysql_connect('localhost','root','');
mysql_select_db('render_vousdb');





// Récupérer le rôle de l'utilisateur
$role = $_SESSION['role'];




//pour tous le monde
//recherche un medecin

if(isset($_POST['recherche'])) 
{
$req="select * from medecin 
where((nom like'%$T1%') or(specialite like '%$T2%'));";
$res=mysql_query($req) or die(mysql_error());

if(mysql_num_rows($res)==0)
die("Aucun medecin avec ces criteres ");



}


//pour l'admine

if($role=='admin'){

// ajouter un medecin
if(isset($_POST['ajouter'])) 
{

$req="select * from medecin where tel='$T4' or email='$T5';";
$res=mysql_query($req) or die("problem ");

if(mysql_num_rows($res)!=0)
echo"ce medecin est deja inscrit !";
else{

	
	mysql_query("insert into medecin(nom,prenom,email,password,tel,adress,specialite,desc,situation,dateDip,heureDispo,date_inscription) values(?????,NOW());") or die(mysql_error());
echo"medecin inscrit avec succee";

}
}






//modifier un medecin

if(isset($_POST['modifier'])) 
{

$req="UPDATE medecin SET nom='$T1', prenom='$T2', email ='$T3', password ='$T4', email='$T5', adress='$T6', specialite='$T7', desc='$T8', situation='$T9' ,dateDisp='' , heurDisp='' WHERE id=$id;";
$res=mysql_query($req) or die("problem ");
echo"le medecin est changee avec succe";

}








//suppression dun medecin 
if(isset($_POST['supprimer'])) 
{
$req=DELETE FROM medecin
WHERE id = $id;

$res=mysql_query($req) or die("problem ");
echo "le medecin est supprime avec succee";
}




}

?>