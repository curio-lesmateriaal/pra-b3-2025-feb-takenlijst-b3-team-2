<?php
global $conn, $base_url;

require_once "../../../../config/conn.php";

$email = $_POST['email'];
$password = $_POST['password'];

$query = "SELECT * FROM users WHERE email = ':email'";
$stmt = $conn->prepare($query);
$stmt->execute
([
    ':email' => $email,
]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user->rowCount() == 0 or !password_verify($password, $user['password']))
{
    header('location: '.$base_url.'/index.php');
    die("Error: Invalid username or password");
}

session_start();

$_SESSION['id'] = $user['id'];
$_SESSION['username'] = $user['username'];
$_SESSION['is_logged_in'] = true;

header('location: '.$base_url.'/index.php');
exit;
