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


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit profile</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <style type="text/css">
        body {
			font-family: Arial, sans-serif;
			background-color: #f2f2f2;
		}
		.container {
			max-width: 800px;
			margin: 0 auto;
			padding: 40px;
			background-color: #fff;
			box-shadow: 0 0 10px rgba(0,0,0,0.2);
		}
		h1 {
			margin-top: 0;
			color: #333;
			text-align: center;
		}
		form {
			display: flex;
			flex-direction: column;
			align-items: center;
			justify-content: center;
			margin-top: 20px;
		}
        label {
			font-size: 18px;
			margin-bottom: 10px;
			color: #555;
			text-align: left;
			width: 100%;
		}
		input, textarea {
			padding: 10px;
			border: 1px solid #ccc;
			border-radius: 4px;
			margin-bottom: 20px;
			width: 100%;
			font-size: 16px;
		}
		textarea {
			height: 100px;
		}
        input[type="submit"] {
			background-color: #4CAF50;
			color: #fff;
			border: none;
			border-radius: 4px;
			padding: 10px 20px;
			font-size: 18px;
			cursor: pointer;
			transition: background-color 0.3s ease;
		}
		input[type="submit"]:hover {
			background-color: #3e8e41;
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
    <div class="container">
		<h1>Edit Profile </h1>
		<form method="post" action="profile_pat.php">
			<label for="name">Nom:</label>
			<input type="text" id="name" name="T1" value="<? echo $_SESSION['pat_nom'];   ?>" required>

			<label for="pre">Prenom:</label>
			<input type="text" id="pre" name="T2" value="<? echo $_SESSION['pat_prenom'];   ?>" required>

			<label for="email">Email:</label>
			<input type="email" id="email" name="T3" value="<? echo $_SESSION['pat_email'];   ?>" required>

			<label for="pass">Password:</label>
			<input type="password" id="pass" name="T4" value="<? echo $_SESSION['pat_password'];   ?>">
			<input type="submit" value="Save" name="modifier">
		</form>


		<form action="logout.php">
		<button type="submit">Logout</button>
	</form>

<br><br>

	
			<form method="post" action="profile_pat.php">
		<button type="submit" name="supprimer">Supprimer your Acount</button>
	</form>
	</div>
	
</body>
