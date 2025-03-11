<?php
global $conn, $base_url;

require_once '../../../../config/conn.php';

$username = $_POST["username"];
$password = $_POST["password"];
$email = $_POST["email"];
$creation_date = date("Y-m-d-h-i");

if ($username == "" or $password == "" or $email == "")
{
    header("Location: $base_url?error=emptyfields");
    die("please fill out the form!");
}

$query = "INSERT INTO users (':username', ':password', ':email' ':creation_date')";
$stmt = $conn->prepare($query);
$stmt->execute
([
    ":username" => $username,
    ":password" => $password,
    ":email" => $email,
    ":creation_date" => $creation_date
]);

$user = $stmt->fetch(PDO::FETCH_ASSOC);

$_SESSION['id'] = $user['id'];
$_SESSION['usr'] = $user['username'];

// TODO add a header to where the user page will be

exit;
