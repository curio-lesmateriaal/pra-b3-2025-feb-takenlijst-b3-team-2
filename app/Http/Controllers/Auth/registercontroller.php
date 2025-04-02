<?php
session_start();
global $conn, $base_url;

require_once '../../../../config/conn.php';

$username = isset($_POST['username']) ? $_POST['username'] : null;
$password = isset($_POST['password']) ? $_POST['password'] : null;
$email = isset($_POST['email']) ? $_POST['email'] : null;

if ($username == null or $password == null or $email == null) {
    header('location: ' . $base_url . '/index.php');
    die("Error: please fill out the form!");
}

$password_hash = password_hash($password, PASSWORD_DEFAULT);

$query = "INSERT INTO users (`email`,`username`, `password`) VALUES (:email,:username ,:password)";
$stmt = $conn->prepare($query);
$stmt->bindParam(':username', $username);
$stmt->bindParam(':password',$password_hash);
$stmt->bindParam(':email', $email);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);

$_SESSION['user_id'] = $user['id'];
$_SESSION['username'] = $username;
$_SESSION['email'] = $email;
$_SESSION['password'] = $password_hash;
$_SESSION['is_logged_in'] = true;
// TODO add a header to where the user page will be
header('location: ' . $base_url . '/index.php');
exit;
