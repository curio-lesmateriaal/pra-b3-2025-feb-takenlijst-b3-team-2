<?php
session_start();
global $base_url, $tasks;

require_once './config/config.php';
require_once "./app/Http/Controllers/Auth/taskcontroller.php";

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
                    $todo = array_filter($tasks, fn($task) => $task['status'] == 'to-do');

                    foreach($todo as $task) {
                        echo "<li>" . $task['titel'] . "</li>";
                    }
                    ?>
                </ul>
            </div>
            <div class="column">
                <h2>Doing</h2>
                <ul class="taken">
                    <?php
                    $doing = array_filter($tasks, fn($task) => $task['status'] == 'doing');

                    foreach($doing as $task) {
                        echo "<li>" . $task['titel'] . "</li>";
                    }
                    ?>
                </ul>
            </div>
            <div class="column">
                <h2>In-Review</h2>
                <ul class="taken">
                    <?php
                    $Review = array_filter($tasks, fn($task) => $task['status'] == 'review');

                    foreach($Review as $task) {
                        echo "<li>" . $task['titel'] . "</li>";
                    }
                    ?>
                </ul>
            </div>
            <div class="column">
                <h2>Done</h2>
                <ul class="taken">
                    <?php
                    $done = array_filter($tasks, fn($task) => $task['status'] == 'done');

                    foreach($done as $task) {
                        echo "<li>" . $task['titel'] . "</li>";
                    }
                    ?>
                </ul>
            </div>
        </div>
    </main>

    <?php require_once "./resources/views/footer.php"; ?>

</body>

</html>
