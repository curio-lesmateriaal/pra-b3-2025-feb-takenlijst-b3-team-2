<?php
session_start();

$id = $_GET['id'];
$_SESSION['task_id'] = $id;


global $base_url;

require_once 'config/config.php';

if (!isset($_SESSION['is_logged_in'])) {
    $_SESSION['is_logged_in'] = false;
}

if ($_SESSION['is_logged_in'] == false) {
    header('location: ' . $base_url . '/login.php');
    exit;
}

require_once "config/conn.php";
?>

<!doctype html>
<html lang="en">
<head>
    <?php require_once "./resources/views/head.php"; ?>
    <title>remove</title>
</head>
<body>
<?php require_once "./resources/views/header.php"; ?>
    <main>
        <form action="app/Http/Controllers/Auth/taskcontroller.php" method="post">
            <input type="hidden" name="action" id="action" value="delete">

            <p>are you sure you want to remove this task</p>
            <input type="submit" name="submit" id="submit" value="yes">
        </form>
    </main>
<?php require_once "./resources/views/footer.php"; ?>
</body>
</html>
