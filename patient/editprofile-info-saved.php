<?php





session_start();
include '../config/config.php';

//$em=$_SESSION['email'];


//extratire d'autre info de la bd apres mise a jour  pour utilser dans d'autre pages

$req_pat = "SELECT * FROM patient ";
    $res_pat =mysqli_query($db,$req_pat) or die("problem2 ");
    if (mysqli_num_rows($res_pat) > 0) {
    $pat = mysqli_fetch_array($res_pat);  }

$_SESSION['pat_nom']=$pat['nom_pat'];
$_SESSION['pat_prenom']=$pat['prenom_pat'];


?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

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
            <p>&copy; 2024 Gestion_RDV</p>
            
          </div>
        </div>
      </div>
    </footer>
    
   
      
      <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
</body>
</html>