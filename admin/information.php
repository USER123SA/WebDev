<?
extract($_POST);
mysql_connect('localhost','root','');
mysql_select_db('render_vousdb');


//verifier si le session est ouvert ou non 
session_start();
if (!isset($_SESSION['id_admin'])) {
        header('Location: login.html');
        exit;
    }



//supprimer un patient


    if (isset($_POST['supp_pat'])) {
$id_pat = $_POST['id_pat'];

$req_pa = "DELETE FROM patient WHERE id= '$id_pat';";
$res_pa= mysql_query($req_pa) or die(mysql_error());

echo "<script>
                alert('patient supprimer avec succes !');
                window.location.href = 'information.php';
            </script>";

}



//supprimer un medecin 


    if (isset($_POST['supp_med'])) {
$id_med = $_POST['id_med'];

$req_med = "DELETE FROM medecin WHERE id= '$id_med';";
$res_med= mysql_query($req_med) or die(mysql_error());

echo "<script>
                alert('medecin supprimer avec succes !');
                window.location.href = 'information.php';
            </script>";

}



// afficher les patients
$req="select * from patient;";
$res=mysql_query($req) or die(mysql_error());


//afficher les medecins

$req1="select * from medecin;";
$res1=mysql_query($req1) or die(mysql_error());

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title> <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" >
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>

</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
          <a class="navbar-brand fs-3 fw-bold" href="../home.php" >HomePage</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse " id="navbarNavDropdown">
            <ul class="navbar-nav ms-auto fs-5">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="../home.php">Home</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    <a  class="btn-primary"><form action="logout.php">
    <button type="submit">Logout</button>
  </form></a>

<center>
<h1><? echo $_SESSION['adm_nom'];   ?></h1></center>

  <br>
  <br><br>
  <center><h1>Les listes des patients enregistrer :  </h1></center>

  <table border="1" width="100%">
  <tr>
    <td>ID patient</td>
    <td>Nom </td>
    <td>Prenom</td>
    <td>Email</td>
    <td>Password</td>
    <td>Tel</td>
    <td>date_inscription</td>
  </tr>
  <?  
  
  
  while($t=mysql_fetch_array($res)) 
  
  
  
  echo"<tr>
    <td> $t[0] </td>
    <td> $t[1]</td>
    <td>  $t[2] </td>
    <td>  $t[5] </td>
    <td>  $t[3] </td>
    <td>  $t[4] </td>
    <td>$t[6]</td>
     <td> <form method='post'>
        <input type='hidden' name='id_pat' value='$t[0]' />
        <button type='submit' name='supp_pat'>Delete</button>
      </form> </td>
  </tr>";
  ?>

</table>



<br><br>

<center><h1>Les listes des Medecins enregistrer :  </h1>

  <table border="2" width="100%">
  <thead>
    <tr>
      <th>ID</th>
      <th>Nom</th>
      <th>Prénom</th>
      <th>Email</th>
      <th>Mot de passe</th>
      <th>Adresse</th>
      <th>Téléphone</th>
      <th>Spécialité</th>
      <th>Description</th>
      <th>Date disponible</th>
      <th>Heure disponible</th>
      <th>Date d'inscription</th>
    </tr>
  </thead>
  <?  
  
  
  while($t1=mysql_fetch_array($res1)) 
  
  
  
  echo"<tr>
    <td> $t1[0] </td>
    <td> $t1[1]</td>
    <td>  $t1[2] </td>
    <td>  $t1[5] </td>
    <td>  $t1[3] </td>
    <td>  $t1[6] </td>
    <td>  $t1[4] </td>
    <td>$t1[7]</td>
    <td>$t1[8]</td>
    <td>$t1[10]</td>
    <td>$t1[11]</td>
    <td>$t1[12]</td>

    <td> <form method='post'>
        <input type='hidden' name='id_med' value='$t1[0]' />
        <button type='submit' name='supp_med'>Delete</button>
      </form> </td>
  </tr>";
  ?>

</table>
</center>



</body>
</html>