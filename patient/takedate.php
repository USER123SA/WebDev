<?


//verifier si le session est ouvert ou non 
session_start();
include '../config/config.php';
if (!isset($_SESSION['pat_email'])) {
  header('Location: login.html');
  exit;
}






?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
    integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
    crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"
    integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT"
    crossorigin="anonymous"></script>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="../home.php">Gestion RDV</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="takedate.php">Ajouter RDV </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="liste_rdv.php">Lister RDV</a>
      </li>     
     
 
    <form class="form-inline my-2 my-lg-0">
    
      
      <li class="nav-item dropdown right">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Profile
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Modifier Profile</a>
          <a class="dropdown-item" href="#">Déconnexion</a>
          
        </div>
      </li>
      
    </ul>
      
    </form>
  </div>
</nav>


  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <form class="border p-3" method="post" action="gestionRendezVous_pat.php">

          <div class="mb-3">

            <label for="name">Nom du Docteur:</label>
            <input type="text" id="name" name="T1" required>
          </div>

          <div class="mb-3">
            <label for="date" class="form-label">Select a date:</label>
            <input type="date" id="date" name="T2" class="form-control">
          </div>
          <div class="mb-3">
            <label for="time" class="form-label">Select a time:</label>
            <input type="text" id="time" name="T3" class="form-control" step="3600">
          </div>
          <button type="submit" class="btn btn-primary" name="ajouter_rdv">Submit</button>
        </form>


        <form action="liste_rdv.php">
          <button type="submit">Listes des rendez-vous</button>
        </form>
      </div>
    </div>
  </div>


</body>

</html>