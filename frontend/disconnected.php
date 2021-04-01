<?php
    session_start();
    session_unset();
    session_destroy();
    echo "<h1> Vous êtes déconnecté </h1>";
    echo "<a href='index.php'>Se connecter</a>";
?>