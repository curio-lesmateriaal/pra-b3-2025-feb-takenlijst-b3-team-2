<?php
require_once "./app/Http/Controllers/Auth/taskcontroller.php";
global $base_url, $tasks;
$tasks = $_SESSION['tasks']?? [];
$_SESSION['action'] = "select";

require_once './config/config.php';

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

    <main class="container">
        <div class="flex-container" id="columns">
            <div class="column">
                <h2>To-do</h2>
                <ul class="taken">
                    <?php
                    $todo = array_filter($tasks, fn($task) => $task['status'] == 'to-do');

                    foreach ($todo as $task) {
                        echo "<li>" . htmlspecialchars($task['titel']) . " " .
                            "<div class=\"button-container\">
                <button class=\"dropdown-button\">
                    <img src=\"./resources/img/icons/menu.png\" alt=\"Button Image\">
                </button>
                <div class=\"dropdown-content\">
                    <a href=\"edit.php?id=" . urlencode($task['id']) . "\" class=\"edit\">Edit</a>
                    <a href=\"remove.php?id=" . urlencode($task['id']) . "?action=delete" . "\" class=\"remove\">Remove</a>
                </div>
            </div>" .
                            "</li>";
                    }
                    ?>
                </ul>
            </div>
            <div class="column">
                <h2>Doing</h2>
                <ul class="taken">
                    <?php
                    $doing = array_filter($tasks, fn($task) => $task['status'] == 'doing');

                    foreach ($doing as $task) {
                        echo "<li>" . htmlspecialchars($task['titel']) . " " .
                            "<div class=\"button-container\">
                <button class=\"dropdown-button\">
                    <img src=\"./resources/img/icons/menu.png\" alt=\"Button Image\">
                </button>
                <div class=\"dropdown-content\">
                    <a href=\"edit.php?id=" . urlencode($task['id']) . "\" class=\"edit\">Edit</a>
                    <a href=\"remove.php?id=" . urlencode($task['id']) . "\" class=\"remove\">Remove</a>
                </div>
            </div>" .
                            "</li>";
                    }
                    ?>
                </ul>

            </div>
            <div class="column">
                <h2>In-Review</h2>
                <ul class="taken">
                    <?php
                    $Review = array_filter($tasks, fn($task) => $task['status'] == 'review');

                    foreach ($Review as $task) {
                        echo "<li>" . htmlspecialchars($task['titel']) . " " .
                            "<div class=\"button-container\">
                <button class=\"dropdown-button\">
                    <img src=\"./resources/img/icons/menu.png\" alt=\"Button Image\">
                </button>
                <div class=\"dropdown-content\">
                    <a href=\"edit.php?id=" . urlencode($task['id']) . "\" class=\"edit\">Edit</a>
                    <a href=\"remove.php?id=" . urlencode($task['id']) . "\" class=\"remove\">Remove</a>
                </div>
            </div>" .
                            "</li>";
                    }
                    ?>
                </ul>
            </div>
            <div class="column">
                <h2>Done</h2>
                <ul class="taken">
                    <?php
                    $done = array_filter($tasks, fn($task) => $task['status'] == 'done');

                    foreach ($done as $task) {
                        echo "<li>" . htmlspecialchars($task['titel']) . " " .
                            "<div class=\"button-container\">
                <button class=\"dropdown-button\">
                    <img src=\"./resources/img/icons/menu.png\" alt=\"Button Image\">
                </button>
                <div class=\"dropdown-content\">
                    <a href=\"edit.php?id=" . urlencode($task['id']) . "\" class=\"edit\">Edit</a>
                    <a href=\"remove.php?id=" . urlencode($task['id']) . "\" class=\"remove\">Remove</a>
                </div>
            </div>" .
                            "</li>";
                    }
                    ?>
                </ul>
            </div>
        </div>
    </main>

    <?php require_once "./resources/views/footer.php"; ?>

</body>

<script src="resources/scripts/dropdown.js"></script>

</html>
