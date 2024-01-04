<?php

extract($_POST);
mysql_connect('localhost','root','');
mysql_select_db('render_vousdb');



session_start();
//verifier la connexion
if (!isset($_SESSION['pat_email'])) {
        header('Location: login.html');
        exit;
    }

$em=$_SESSION['pat_email'];


//extratire d'autre info de la bd apres mise a jour  pour utilser dans d'autre pages

$req_pat = "SELECT * FROM patient WHERE email='$em';";
    $res_pat =mysql_query($req_pat) or die("problem2 ");
    if (mysql_num_rows($res_pat) > 0) {
    $pat = mysql_fetch_array($res_pat);  }

$_SESSION['pat_nom']=$pat['nom'];
$_SESSION['pat_prenom']=$pat['prenom'];


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
      <h1>your informations are updated!<br>  Bienvenue <? echo $_SESSION['pat_nom'];   ?>   <? echo $_SESSION['pat_prenom'];   ?></h1>


<br><br>
<form action="takedate.php">
    <button style="color:blue; "type="submit">prendre rendez-vous</button>
  </form>



      <footer class="bg-dark text-light py-3 ">
        <div class="container">
          <div class="row justify-content-center align-items-center">
            <div class="col-12 text-center">
              <p>&copy; 2023 My Website</p>
            </div>
          </div>
        </div>
      </footer>
      
      <div class="bg-secondary py-3">
        <div class="container">
          <div class="row justify-content-center align-items-center">
            <div class="col-12 col-md-8 col-lg-6 text-center">
              <p class="mb-0 text-light">Besoin d'aide ? Contactez-nous</p>
            </div>
          </div>
        </div>
      </div>
</body>
</html>