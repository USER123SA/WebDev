<?
extract($_POST);
mysql_connect('localhost','root','');
mysql_select_db('render_vousdb');



session_start();






if(isset($_POST['login'])) {

$req="select * from medecin where(email='$T3' or password='$T4');";
$res=mysql_query($req) or die("problem ");

if(mysql_num_rows($res)==0){
$error = "Email or Password is invalid";
echo "<script>
                alert('$error');
                window.location.href = 'login.html';
            </script>";
}else{


//extratire d'autre info de la bd pour utilser dans d'autre pages
$req_med = "SELECT * FROM medecin WHERE email='$T3';";
    $res_med =mysql_query($req_med) or die("problem2 ");
    if (mysql_num_rows($res_med) > 0) {
    $med = mysql_fetch_array($res_med);  }



// utilser pour ne peut acceder a des pages sans connections et pour utiliser ces variables en tant que connecté
$_SESSION['user_type'] ='medecin';
$_SESSION['med_id']=$med['id'];
$_SESSION['med_nom']=$med['nom'];
$_SESSION['med_prenom']=$med['prenom'];
$_SESSION['med_email'] =$T3;
$_SESSION['med_password'] =$T4;
$_SESSION['med_adress']=$med['adress'];
$_SESSION['med_specialite']=$med['specialite'];
$_SESSION['med_desc']=$med['description'];
      
header("Location: Editprofile.php");
      exit;}
  }






if(isset($_POST['signup'])) {

$req="select * from medecin where tel='$T5' or email='$T3';";
$res=mysql_query($req) or die("problem ");

if(mysql_num_rows($res)!=0){
$error ="vous etes deja inscrit !";
echo "<script>
                alert('$error');
                window.location.href = 'register.html';
            </script>";  }
else{
	//nom ,prenom,email,password,tel,adress,specialite,desc,dateDip,heureDispo
	mysql_query("insert into medecin(nom,prenom,email,password,tel,adress,specialite,description,date_inscription)                                                   values('$T1','$T2','$T3','$T4','$T5','$T6','$T7','$T8',NOW());") or die(mysql_error());
//echo"felicitation vous etes inscrit";

//extratire d'autre info de la bd pour utilser dans d'autre pages
$req_med = "SELECT * FROM medecin WHERE email='$T3';";
    $res_med =mysql_query($req_med) or die("problem2 ");
    if (mysql_num_rows($res_med) > 0) {
    $med = mysql_fetch_array($res_med);  }



// utilser pour ne peut acceder a des pages sans connections et pour utiliser ces variables en tant que connecté
$_SESSION['user_type'] ='medecin';
$_SESSION['med_nom']=$med['nom'];
$_SESSION['med_prenom']=$med['prenom'];
$_SESSION['med_email'] =$T3;
$_SESSION['med_password'] =$T4;
$_SESSION['med_adress']=$med['adress'];
$_SESSION['med_specialite']=$med['specialite'];
$_SESSION['med_desc']=$med['description'];

	header("Location: Editprofile.php");
      exit;

}
}

?>