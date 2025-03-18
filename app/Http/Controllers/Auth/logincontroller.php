<?php
session_start();
global $conn, $base_url;

require_once "../../../../config/conn.php";

$email = isset($_POST['email']) ? $_POST['email'] : null;
$password = isset($_POST['password']) ? $_POST['password'] : null;
if($email == null or $password == null)
{
    header('location: '.$base_url.'/index.php');
    die("Error: please fill out the form!");
}

$query = "SELECT * FROM users WHERE email = :email";
$stmt = $conn->prepare($query);
$stmt->bindParam(':email', $email);
$stmt->execute();
$user = $stmt->fetch();

if ($stmt->rowCount() == 0 or !password_verify($password, $user['password']))
{
    header('location: '.$base_url.'/index.php');
    die("Error: Invalid username or password");
}


$_SESSION['id'] = $user['id'];
$_SESSION['username'] = $user['username'];
$_SESSION['is_logged_in'] = true;

header('location: '.$base_url.'/index.php');
exit;
