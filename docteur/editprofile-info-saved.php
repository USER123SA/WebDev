<?
extract($_POST);
mysql_connect('localhost','root','');
mysql_select_db('render_vousdb');


session_start();
if (!isset($_SESSION['med_email'])) {
        header('Location: login.html');
        exit;
    }



$em=$_SESSION['med_email'];

//extratire d'autre info de la bd apres mise a jour  pour utilser dans d'autre pages
$req_med = "SELECT * FROM medecin WHERE email='$em';";
    $res_med =mysql_query($req_med) or die("problem2 ");
    if (mysql_num_rows($res_med) > 0) {
    $med = mysql_fetch_array($res_med);  }



$_SESSION['med_nom']=$med['nom'];
$_SESSION['med_prenom']=$med['prenom'];



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

    <style type="text/css">
        body {
         background-color: #f0f0f0;
        }

        .logo-container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 200px;
        }

        img {
        max-width: 100%;
        max-height: 100%;
        }

        h1 {
        text-align: center;
        font-size: 48px;
        margin-top: 40px;
        font-family: sans-serif;
        color: #333;
        }

    </style>
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
    <div class="logo-container">
        <img src="checked.png" alt="Checked Logo">
      </div>
      <h1>your informations are updated! <br>  Bienvenue <? echo $_SESSION['med_nom'];   ?>   <? echo $_SESSION['med_prenom'];   ?> </h1>
      <button href="liste_rdv_docteur.html">liste</button>
      <button href="Edit profile.html">edit again</button>
</body>
</html>