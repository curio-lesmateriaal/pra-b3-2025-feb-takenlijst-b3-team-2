<?php
session_start();
global $base_url;

require_once 'config/config.php';

?>

<!doctype html>
<html lang="nl">

<head>
    <title></title>
    <?php require_once "./resources/views/head.php"; ?>
</head>

<body>

    <?php require_once "./resources/views/header.php"; ?>

    <div class="container">

        <div>
            <img src="./resources/img/logo.png" alt="big-logo">
            <h2>Welkom bij de Developer Land to-do app!</h2>
        </div>
    </div>

    <?php require_once "./resources/views/footer.php"; ?>

</body>

</html>