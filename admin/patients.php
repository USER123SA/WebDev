<?
extract($_POST);
mysql_connect('localhost','root','');
mysql_select_db('render_vousdb');



//recherche un patient



if (isset($_POST['rechercher'])) {
$req="select *
from patient 
where  (nom like'%$T1%') or (prenom like'%$T1%' ) or (id  like'%$T1%') or (tel like'%$T1%')";
$res=mysql_query($req) or die(mysql_error());

if(mysql_num_rows($res)==0)
die("Aucun patient avec le critere choisi");

}


// ajouter un patient
if (isset($_POST['ajouter'])) {

$req="select * from patient where tel='$T4' or email='$T5';";
$res=mysql_query($req) or die("problem ");

if(mysql_num_rows($res)!=0)
echo"cette patient est deja inscrit !";
else{

	
	mysql_query("insert into patient(nom,prenom,email,password,tel,date_inscription) values(.......),NOW());") or die(mysql_error());
echo"felicitation vous etes inscrit et ajouter avec notre patients";

}

}




//modifier un patient

if (isset($_POST['modifier'])) {

$req="UPDATE patient SET nom='$nom', prenom='$prenom',tel='$telephone',email='$email',password='$password' WHERE id=$id;";
$res=mysql_query($req) or die("problem ");
echo"felicitation le patient a éte changée";



}
//supprimer un patient

if (isset($_POST['supprimer'])) {

$req="DELETE from patient WHERE id=$id;";
$res=mysql_query($req) or die("problem ");
echo"felicitation le patient éte supprimée";


}



?>