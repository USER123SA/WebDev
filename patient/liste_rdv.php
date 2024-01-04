<?
extract($_POST);
mysql_connect('localhost','root','');
mysql_select_db('render_vousdb');


//verifier si le session est ouvert ou non 
session_start();
if (!isset($_SESSION['pat_email'])) {
        header('Location: login.html');
        exit;
    }



$id_patient=$_SESSION['pat_id'];


$req="select * from rdv where idPatient='$id_patient';";
$res=mysql_query($req) or die(mysql_error());




//annuler un rendez-vous


    if (isset($_POST['annuler_rdv'])) {
$id_rdv = $_POST['id_rdv'];

$req = "DELETE FROM rdv WHERE idRdv= $id_rdv;";
$res = mysql_query($req) or die(mysql_error());

echo "<script>
                alert('Aprés une verification de l admin Le rendez-vous sera annulé !');
                window.location.href = 'liste_rdv.php';
            </script>";

}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>liste rdv patient</title><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
     <section class="main">
      
        <table border="2" width="100%">
  <tr>
    <td>ID RDV</td>
    <td>ID medecin</td>
    <td>ID patient</td>
    <td>Date Rendez-vous</td>
    <td>Heure Rendez-vous</td>
  </tr>

              <?
              // Here, you would retrieve the data from your database
              // and loop through the records to generate the table rows
              

  while($t=mysql_fetch_array($res)) 



                  echo"<tr>
    <td> $t[0] </td>
    <td> $t[1]</td>
    <td>  $t[2] </td>
    <td>  $t[3] </td>
    <td>  $t[4] </td>
    <td> <form method='post'>
        <input type='hidden' name='id_rdv' value='$t[0]' />
        <button type='submit' name='annuler_rdv'>Delete</button>
      </form> </td>
  </tr>";

                  
              
              ?>

          </table>
          


     </section>
</body>
</html>