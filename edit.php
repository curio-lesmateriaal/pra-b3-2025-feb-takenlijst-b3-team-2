<?php
session_start();
global $base_url, $conn, $tasks;

require_once 'config/config.php';
require_once "./app/Http/Controllers/Auth/taskcontroller.php";
$_SESSION['action']  = "edit";
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
                <option value="IT" <?php if ($_SESSION['department'] == "IT") {echo "selected";} ?>>IT</option>
                <option value="Sales" <?php if ($_SESSION['department'] == "Sales") {echo "selected";} ?>>Sales</option>
                <option value="Development" <?php if ($_SESSION['department'] == "Development") {echo "selected";} ?>>Development</option>
                <option value="Marketing" <?php if ($_SESSION['department'] == "Marketing") {echo "selected";} ?>>Marketing</option>
                <option value="Cybersecurity" <?php if ($_SESSION['department'] == "Cybersecurity") {echo "selected";} ?>>Cybersecurity</option>
                <option value="Finance" <?php if ($_SESSION['department'] == "Finance") {echo "selected";} ?>>Finance</option>
                <option value="HR" <?php if ($_SESSION['department'] == "HR") {echo "selected";} ?>>HR</option>
            </select>
            <select name="status" id="status" >
                <option value="to-do" <?php if ($_SESSION['status'] == "to-do") {echo "selected";} ?>>to-do</option>
                <option value="doing" <?php if ($_SESSION['status'] == "doing") {echo "selected";} ?>>doing</option>
                <option value="review" <?php if ($_SESSION['status'] == "review") {echo "selected";} ?>>review</option>
                <option value="done" <?php if ($_SESSION['status'] == "done") {echo "selected";} ?>>done</option>
            </select>
            <input type="date" name="date" id="date" value="<?php echo $_SESSION['deadline']; ?>">
            <input type="submit" name="submit" id="submit">
        </form>
    </main>

<?php require_once "./resources/views/footer.php"; ?>

</body>
</html>
