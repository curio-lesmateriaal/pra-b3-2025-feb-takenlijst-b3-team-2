<?php
session_start();
global $base_url;

require_once 'config/config.php';
if (!isset($_SESSION['is_logged_in'])) {
    $_SESSION['is_logged_in'] = false;
}


?>

<!doctype html>
<html lang="nl">

<head>
    <title>home</title>
    <?php require_once "./resources/views/head.php"; ?>
</head>

<body>

    <?php require_once "./resources/views/header.php"; ?>

    <div class="container">
        <img src="./resources/img/logo.png" alt="big-logo">
        <h2>Bouw je workflow, beheer je taken – Developer Land To-Do.</h2>
        <p>Welkom bij Developer Land To-Do, dé plek waar je projecten georganiseerd en productief blijven. Sleep,
            sorteer en voltooi taken met gemak, net zoals in Trello – maar dan speciaal voor jouw team. Werk slimmer,
            niet harder! 🚀</p>
    </div>

    <?php require_once "./resources/views/footer.php"; ?>

</body>

</html>
