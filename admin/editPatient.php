
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Profil</title>
    <!-- Liens vers les fichiers CSS -->
    <link href="../assets/img/icon.png" rel="icon">
    <link href="https://fonts.googleapis.com/css?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background: url(../assets/img/medicine-blue-background-flat-lay.jpg);
        }
        .inner-row {
            height: 100vh;
        }
        .form-box {
            background: #fff;
            box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
            border-radius: 1rem;
            padding: 20px;
        }
    </style>
</head>
<?php
// Inclure le fichier de configuration de la base de données
require_once "../config/config.php";

// Initialiser les variables
$nom_pat = $prenom_pat = $sexe = $tel_pat = $email_pat = $date_nais = "";
$id = "";

// Vérifier si l'identifiant du patient est présent dans l'URL
if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
    // Récupérer l'identifiant du patient depuis l'URL
    $id = trim($_GET["id"]);

    // Préparer la requête SQL de sélection
    $sql = "SELECT * FROM patient WHERE idpatient = $id";

    // Exécuter la requête SQL
    $result = mysqli_query($db, $sql);

    if ($result) {
        // Vérifier s'il y a des données retournées
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            // Récupérer les données du patient
            $nom_pat = $row["nom_pat"];
            $prenom_pat = $row["prenom_pat"];
            $sexe = $row["sexe"];
            $tel_pat = $row["tel_pat"];
            $email_pat = $row["email_pat"];
            $date_nais = $row["date_naissance"];
        } else {
            // Rediriger vers la page d'erreur si l'identifiant du patient n'existe pas
            header("location: error.php");
            exit();
        }
    } else {
        echo "Erreur : " . mysqli_error($mysqli);
    }

    // Fermer la connexion à la base de données
    mysqli_close($db);
} else {
    // Rediriger vers la page d'erreur si aucun identifiant de patient n'est fourni dans l'URL
    header("location: error.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un patient</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h2>Modifier un patient</h2>
                <form action="updatePatient.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <div class="form-group">
                        <label>Nom</label>
                        <input type="text" name="nom_pat" class="form-control" value="<?php echo $nom_pat; ?>">
                    </div>
                    <div class="form-group">
                        <label>Prénom</label>
                        <input type="text" name="prenom_pat" class="form-control" value="<?php echo $prenom_pat; ?>">
                    </div>
                    <div class="form-group">
                        <label>Sexe</label>
                        <input type="text" name="sexe" class="form-control" value="<?php echo $sexe; ?>">
                    </div>
                    <div class="form-group">
                        <label>Numéro de téléphone</label>
                        <input type="text" name="tel_pat" class="form-control" value="<?php echo $tel_pat; ?>">
                    </div>
                    <div class="form-group">
                        <label>E-mail</label>
                        <input type="email" name="email_pat" class="form-control" value="<?php echo $email_pat; ?>">
                    </div>
                    <div class="form-group">
                        <label>Date de naissance</label>
                        <input type="date" name="date_naissance" class="form-control" value="<?php echo $date_nais; ?>">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Modifier">
                        <a href="information.php" class="btn btn-secondary">Annuler</a>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <!-- Pied de page -->
    <footer id="footer">
        <div class="container d-md-flex py-4">
            <div class="me-md-auto text-center text-md-start" style="display: flex; align-items: center;">
                <div class="copyright">
                    &copy; Copyright <strong><span>Gestion_RDV</span></strong>. Tous droits reservés
                </div>
                <div style="display: inline-block; margin-left: 860px;">
                    Besoin Aide ? <a href="mailto:myhealth@gmail.com">Contactez_Nous</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Liens vers les fichiers JS -->
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
