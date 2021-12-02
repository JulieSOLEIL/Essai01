<?php
    $page = 'login';
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
        <form method="post" action="verif.php">
            <label>Votre login </label>
            <input type="text" name="login">
            <button type="submit">Valider</button>
        </form>
    </section>
</body>
</html>