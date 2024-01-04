<?
extract($_POST);
mysql_connect('localhost','root','');
mysql_select_db('render_vousdb');



session_start();


if(isset($_POST['login'])) {
$req="select * from admin where(email='$T1' and password='$T2');";
$res=mysql_query($req) or die("problem ");

if(mysql_num_rows($res)==0){
	
$error = "Email or Password is invalid";
echo "<script>
                alert('$error');
                window.location.href = 'login.html';
            </script>";
   }
else{

//extratire d'autre info de la bd pour utilser dans d'autre pages
$req= "SELECT * FROM admin WHERE email='$T1';";
    $res =mysql_query($req) or die("problem2 ");
    if (mysql_num_rows($res) > 0) {
    $adm = mysql_fetch_array($res);  }



// utilser pour ne peut acceder a des pages sans connections et pour utiliser ces variables en tant que connecté
$_SESSION['user_type'] ='admin';
$_SESSION['id_admin']='1';
$_SESSION['adm_nom']=$adm['nom'];
$_SESSION['adm_email'] =$T1;
$_SESSION['adm_password'] =$T2;

header("Location: information.php");
      exit;}
  }
  


?>