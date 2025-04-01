<?php 
$user_id = isset($_SESSION['id']) ? $_SESSION['id'] : null;
if($user_id == null)
{
    header('location: '.$base_url.'/login.php');
    die("Error: please log in!");
}
require_once __DIR__ . '/../../../../config/conn.php'; 
$sql = "SELECT * FROM taken WHERE user = :user_id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':user_id', $user_id);
$stmt->execute();
$tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);
