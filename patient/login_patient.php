<?
extract($_POST);
mysql_connect('localhost','root','');
mysql_select_db('render_vousdb');



session_start();
$error='';

if(isset($_POST['login'])) {

$req="select * from patient where (email='$email' or password='$password');";
$res=mysql_query($req) or die("problem ");

if(mysql_num_rows($res)==0){
   
$error = "Email or Password is invalid";
echo "<script>
                alert('$error');
                window.location.href = 'login.html';
            </script>";
}else{


    
           
//extratire d'autre info de la bd pour utilser dans d'autre pages
$req_pat = "SELECT * FROM patient WHERE email='$email';";
    $res_pat =mysql_query($req_pat) or die("problem2 ");
    if (mysql_num_rows($res_pat) > 0) {
    $pat = mysql_fetch_array($res_pat);  }



// utilser pour ne peut acceder a des pages sans connections et pour utiliser ces variables en tant que connecté
$_SESSION['user_type'] ='patient';
$_SESSION['pat_nom']=$pat['nom'];
$_SESSION['pat_prenom']=$pat['prenom'];
$_SESSION['pat_email'] =$email;
$_SESSION['pat_password'] =$password;
$_SESSION['pat_tel']=$pat['tel'];
$_SESSION['pat_id']=$pat['id'];

header("Location: editprofile.php");
      exit;


}
  }



if(isset($_POST['signup'])) {

$req="select * from patient where tel='$T5' or email='$T3';";
$res=mysql_query($req) or die("problem ");

if(mysql_num_rows($res)!=0){
$error ="vous etes deja inscrit !";
echo "<script>
                alert('$error');
                window.location.href = 'register.html';
            </script>";}

else{

	//nom,prenom,email,passworld,tel
	mysql_query("insert into patient (nom,prenom,email,password,tel,date_inscription) values('$T1','$T2','$T3','$T4','$T5',NOW());") or die(mysql_error());
//echo"felicitation vous etes inscrit et ajouter avec notre patients";

      //extratire d'autre info de la bd pour utilser dans d'autre pages
$req_pat = "SELECT * FROM patient WHERE email='$T3';";
    $res_pat =mysql_query($req_pat) or die("problem2 ");
    if (mysql_num_rows($res_pat) > 0) {
    $pat = mysql_fetch_array($res_pat);  }



// utilser pour ne peut acceder a des pages sans connections et pour utiliser ces variables en tant que connecté
$_SESSION['user_type'] ='patient';
$_SESSION['pat_nom']=$pat['nom'];
$_SESSION['pat_prenom']=$pat['prenom'];
$_SESSION['pat_email'] =$T3;
$_SESSION['pat_password'] =$T4;
$_SESSION['pat_tel']=$pat['tel'];
$_SESSION['pat_id']=$pat['id'];

header("Location: editprofile.php");
      exit;

}
}


?>