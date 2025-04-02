<?php
global $base_url, $conn;

require_once __DIR__ . '/../../../../config/conn.php';

$user_id = isset($_SESSION['id']) ? $_SESSION['id'] : null;
if($user_id == null)
{
    header('location: '.$base_url.'/login.php');
    die("Error: please log in!");
}

$title = $_POST["title"];
$content = $_POST["bescrijving"];
$department = $_POST["department"];
$status = $_POST["status"];
$deadline = $_POST["deadline"];

if (empty($title) || empty($content) || empty($department) || empty($status) || empty($deadline))
{
    header('location: '.$base_url.'/edit.php?$id');
    die("Error: please fill out the form!");
}

$sql = "UPDATE taken SET titel =':titel', bescrijving = ':bescrijving', afdeling = ':afdeling', status = ':status', deadline='deadline'  WHERE id = ':id'";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':titel', $title);
$stmt->bindParam(':bescrijving', $content);
$stmt->bindParam(':afdeling', $department);
$stmt->bindParam(':status', $status);
$stmt->bindParam(':deadline', $deadline);
$stmt->bindParam(':id', $user_id);
$stmt->execute();

header('location: '.$base_url.'/takenlijst.php');
