<?php
$user_id = isset($_SESSION['id']) ? $_SESSION['id'] : null;
if($user_id == null)
{
    header('location: '.$base_url.'/login.php');
    die("Error: please log in!");
}

require_once __DIR__ . '/../../../../config/conn.php'; 
if(isset($_POST['action'])||isset($_SESSION['action'])) {
    if($_SESSION['action'] == "select"||$_POST['action'] == "select"){
        $sql = "SELECT * FROM taken WHERE user = :user_id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();
        $tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }elseif($_POST['action'] == 'create') {
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
    }elseif($_POST['action'] == "delete"){
    }
}