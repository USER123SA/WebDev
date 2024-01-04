<?


//connexin a la base:
extract($_POST);
mysql_connect('localhost','root','');
mysql_select_db('render_vousdb');


// Vérification de l'état de connexion de l'administrateur
    session_start();
    if (!isset($_SESSION['id_admin'])) {
        header('Location: login.html');
        exit;
    }


    





?>