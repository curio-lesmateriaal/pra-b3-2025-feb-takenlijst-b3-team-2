<?php 
$user_id = isset($_SESSION['id']) ? $_SESSION['id'] : null;
if($user_id == null)
{
    header('location: '.$base_url.'/login.php');
    die("Error: please log in!");
}
require_once __DIR__ . '/../../../../config/conn.php'; 
if(isset($_POST['action'])) {
    if($_POST['action'] == 'create') {
        $title = $_POST['title'];
        $description = $_POST['description'];
        $afdeling = $_POST['afdeling'];
        $status = 'to-do';
        $sql = "INSERT INTO taken (titel, beschrijving, afdeling, status, user) VALUES (:title, :description, :afdeling, :status, :user_id)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':afdeling', $afdeling);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':user_id', $user_id);
        if ($stmt->execute()) {
            header('location: takenlijst.php');
            exit;
        } else {
            echo "Error creating task.";
        }
    }elseif($_POST['action'] == 'update'){

    }elseif($_POST['action'] == "select"){
        $sql = "SELECT * FROM taken WHERE user = :user_id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();
        $tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }elseif($_POST['action'] == "delete"){
    }
}