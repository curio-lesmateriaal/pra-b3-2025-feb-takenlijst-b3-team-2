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
    <h1>Create Task</h1>
    <form action="create.php" method="POST">
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" required>
        
        <label for="description">Description:</label>
        <textarea id="description" name="description" required></textarea>
        <label for = "afdeling">Afdeling:</label>
        <select id="afdeling" name="afdeling" required>
            <option value="development">Development</option>
            <option value="sales">Sales</option>
            <option value="marketing">Marketing</option>
            <option value="cybersecurity">Cybersecurity</option>
            <option value="finance">Finance</option>
            <option value="iT">IT</option>
        <button type="submit">Create Task</button>
    </main>
</body>
</html>