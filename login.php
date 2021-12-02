<?php
session_start();
$page= 'login';
$erreur= '';

// Demande si on est en méthode 'POST', si oui, fais le code suivant...
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

//Connexion à la base
$dbConnect = new PDO('mysql:host=localhost;dbname=demo_personne;charset=utf8', 'root', '');

$login = $_POST['login'];

$sql = 'SELECT * FROM personne WHERE nom = \''.$login.'\'';
//var_dump($sql);

$stat_pers = $dbConnect->query($sql);
//var_dump($stat_pers);

//si login bon enregistrement
if ($stat_pers-> rowCount()== 1){
$pers = $stat_pers->fetch();
//var_dump($pers);
$_SESSION['user'] = $login;
header('Location: index.php');

exit();
// ici je demande d'arrêter le script au-dessus

}
$erreur = 'Erreur de connexion';

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>


<body>
    <?php
        include 'inc/entete.php';
    ?>
    <section>
        <h3>Identifiez vous</h3>
        <form method="POST" action="login.php">
            <?php
            if ($erreur != ''){
                echo '<h5>'.$erreur.'</h5>';
            }
            ?>
            <label>Votre login </label>
            <input type="text" name="login">
            <button type="submit">Valider</button>
        </form>
    </section>
</body>
</html>