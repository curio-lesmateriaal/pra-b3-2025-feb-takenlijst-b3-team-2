<?php
global $conn, $base_url;

require_once "../../../../config/conn.php";

$username = isset($_POST['username']) ? $_POST['username'] : null;
$password = isset($_POST['password']) ? $_POST['password'] : null;
if($username == null or $password == null)
{
    header('location: '.$base_url.'/index.php');
    die("Error: please fill out the form!");
}
$query = "SELECT * FROM users WHERE username = ':username'";
$stmt = $conn->prepare($query);
$stmt->bindParam(':username', $username);
$stmt->execute();
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

// TODO add a header to where the user page will be
header('location: '.$base_url.'/index.php');
exit;
