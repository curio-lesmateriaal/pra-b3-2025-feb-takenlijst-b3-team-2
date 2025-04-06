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
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Create</title>
    <?php require_once "./resources/views/head.php"; ?>
</head>

<body>
    <?php require_once "./resources/views/header.php"; ?>
    <main>
        <div class="create-box">
            <div class="create-border">
                <h1>Create Task</h1>
                <form class="create-form" action="app/Http/Controllers/Auth/taskcontroller.php" method="post">
                    <label for="title">Title:</label>
                    <input type="text" id="title" name="title" required>
                    <label for="description">Description:</label>
                    <textarea id="description" name="description" required></textarea>
                    <label for="afdeling">Afdeling:</label>
                    <select id="afdeling" name="department" required>
                        <option value="Development">Development</option>
                        <option value="Sales">Sales</option>
                        <option value="Marketing">Marketing</option>
                        <option value="Cybersecurity">Cybersecurity</option>
                        <option value="Finance">Finance</option>
                        <option value="IT">IT</option>
                    </select>
                    <input type="date" id="deadline" name="deadline" required>
                    <input type="hidden" name="action" value="create">
                    <button type="submit">Create Task</button>
                </form>
            </div>
        </div>
    </main>
    <?php require_once "./resources/views/footer.php"; ?>
</body>

</html>