<?php
global $conn, $base_url;

require_once "../../../../config/conn.php";

$username = $_POST['username'];
$password = $_POST['password'];

$query = "SELECT * FROM users WHERE username = ':username'";
$stmt = $conn->prepare($query);
$stmt->execute
([
    ':username' => $username,
]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user->rowCount() == 0 or !password_verify($password, $user['password']))
{
    header('location: '.$base_url.'/index.php');
    die("Error: Invalid username or password");
}

session_start();

$_SESSION['id'] = $user['id'];
$_SESSION['usr'] = $user['username'];

// TODO add a header to where the user page will be

exit;
