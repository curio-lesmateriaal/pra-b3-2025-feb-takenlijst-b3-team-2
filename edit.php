<?php
session_start();
global $base_url, $conn, $tasks;

require_once 'config/config.php';
require_once "./app/Http/Controllers/Auth/taskcontroller.php";
$_SESSION['action']  = "select";
if (!isset($_SESSION['is_logged_in'])) {
    $_SESSION['is_logged_in'] = false;
}

if ($_SESSION['is_logged_in'] == false) {
    header('location: ' . $base_url . '/login.php');
    exit;
}

require_once "config/conn.php";

$id = $_GET['id'];

?>

<!doctype html>
<html lang="en">
<head>
    <title>edit</title>
    <?php require_once "./resources/views/head.php"; ?>
</head>
<body>

<?php require_once "./resources/views/header.php"; ?>

    <main>
        <form action="app/Http/Controllers/Auth/taskcontroller.php" method="post">
            <input type="hidden" name="action" id="action" value="update">

            <input type="text" name="title" id="title" value="<?php echo $_SESSION['title']; ?>">
            <textarea name="content" id="content" cols="30" rows="10" ><?php echo $_SESSION['description']; ?></textarea>
            <select name="department" id="department">
                <option value="IT">IT</option>
                <option value="Sales">Sales</option>
                <option value="Development">Development</option>
                <option value="Marketing">Marketing</option>
                <option value="Cybersecurity">Cybersecurity</option>
                <option value="Finance">Finance</option>
                <option value="HR">HR</option>
            </select>
            <select name="status" id="status" >
                <option value="to-do">to-do</option>
                <option value="doing">doing</option>
                <option value="review">review</option>
                <option value="done">done</option>
            </select>
            <input type="date" name="date" id="date" value="<?php echo $_SESSION['deadline']; ?>">
            <input type="submit" name="submit" id="submit">
        </form>
    </main>

<?php require_once "./resources/views/footer.php"; ?>

</body>
</html>
