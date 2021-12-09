<header>
    <h1>Vous êtes sur la page <?php echo $vue; ?></h1>
    <?php
        session_start();
        if (isset($_SESSION['user'])) {
            echo '<h3>Bonjour '.$_SESSION['user'].'</h3>';
        }
        session_write_close();
    ?>
</header>
