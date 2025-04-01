<?php
global $base_url;

require_once 'config/config.php';

session_start();
if (!isset($_SESSION['is_logged_in'])) {
    $_SESSION['is_logged_in'] = false;
}

if ($_SESSION['is_logged_in'] == false) {
    header('location: ' . $base_url . '/login.php');
    exit;
}
?>

<!doctype html>
<html lang="nl">

<head>
    <title>taken</title>
    <?php require_once "./resources/views/head.php"; ?>
</head>

<body>

    <?php require_once "./resources/views/header.php"; ?>

    <main class="container takenlijst">
        <div class="flex-container" id="columns">
            <div class="column">
                <h2>To-do</h2>
                <ul class="taken">
                    <?php
                    foreach($tasks as $task) {
                        if ($task['status'] == 'To-do') {
                            echo "<li>" . $task['name'] . "</li>";
                        }
                    }
                    ?>
                </ul>
            </div>
            <div class="column">
                <h2>Doing</h2>
                <ul class="taken">
                    <?php
                    foreach($tasks as $task) {
                        if ($task['status'] == 'doing') {
                            echo "<li>" . $task['name'] . "</li>";
                        }
                    }
                    ?>
                </ul>
            </div>
            <div class="column">
                <h2>In-Review</h2>
                <ul class="taken">
                    <?php
                    foreach($tasks as $task) {
                        if ($task['status'] == 'in-Review') {
                            echo "<li>" . $task['name'] . "</li>";
                        }
                    }
                    ?>
                </ul>
            </div>
            <div class="column">
                <h2>Done</h2>
                <ul class="taken">
                    <?php
                    foreach($tasks as $task) {
                        if ($task['status'] == 'done') {
                            echo "<li>" . $task['name'] . "</li>";
                        }
                    }
                    ?>
                </ul>
            </div>
        </div>
    </main>

    <?php require_once "./resources/views/footer.php"; ?>

</body>

</html>
