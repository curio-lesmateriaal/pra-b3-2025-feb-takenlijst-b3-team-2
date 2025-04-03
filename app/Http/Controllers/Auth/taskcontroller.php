<?php
session_start();
$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
global $conn, $base_url;
$_SESSION[' error'] = "";
echo $_POST['action'];
echo "<br>";
echo $_SESSION['action'];
require_once __DIR__ . '/../../../../config/conn.php';
if(isset($_POST['action'])||isset($_SESSION['action'])) {
    switch($_SESSION['action']??$_POST['action']) {
        case 'create':
            if(empty($_POST['title']) || empty($_POST['description']) || empty($_POST['afdeling'])) {
                $_SESSION['error'] = 'Please fill out all fields.';
                // header('location: '.$base_url.'/takenlijst.php');
                break;
            }
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
                break;
            } else {
                $_SESSION['error'] = 'Error creating task.';
                header('location: '.$base_url.'/takenlijst.php');
                break;
            } 
        case 'edit':
            if($_POST['action'] == "update"){
                break;
            }
            $sql = "SELECT * FROM taken WHERE id = :task_id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':task_id', $_SESSION['task_id']);
            $stmt->execute();
            $tasks = $stmt->fetch(PDO::FETCH_ASSOC);
    
            $_SESSION['title'] = !empty($tasks['titel']) ? $tasks['titel'] : '';
            $_SESSION['description'] = !empty($tasks['beschrijving']) ? $tasks['beschrijving'] : '';
            $_SESSION['status'] = !empty($tasks['status']) ? $tasks['status'] : '';
            $_SESSION['department'] = !empty($tasks['afdeling']) ? $tasks['afdeling'] : '';
            $_SESSION['deadline'] = !empty($tasks['deadline']) ? $tasks['deadline'] : '';
            header('location: '.$base_url.'/takenlijst.php');
            break;
        case 'delete':
            $task_id = $_SESSION['task_id'];
            $sql = "DELETE FROM taken WHERE id = :id AND user = :task_id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':task_id', $task_id);
            if ($stmt->execute()) {
                header('location: '.$base_url.' takenlijst.php');
                exit();
            } else {
                echo "Error deleting task.";
            }
            header('location: '.$base_url.'/takenlijst.php');
            break;
        case 'select':
            $user_id = $_SESSION['user_id'];
            if (empty($user_id)) {
                die("Error: please log in!");
            }
            $sql = "SELECT * FROM taken WHERE user = :user_id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':user_id', $user_id);
            $stmt->execute();
            $tasks = $stmt->fetchall(PDO::FETCH_ASSOC);
            $_SESSION['tasks'] = $tasks;
            break;
        case 'update':
            $title = $_POST["title"];
            $content = $_POST["content"];
            $department = $_POST["department"];
            $status = $_POST["status"];
            $deadline = $_POST["date"];
            
            if (empty($title) || empty($content) || empty($department) || empty($status) || empty($deadline))
            {
                header('location: '.$base_url.'/edit.php?$id');
                die("Error: please fill out the form!");
            }
    
            $sql = "UPDATE taken SET titel = :titel, beschrijving = :beschrijving, afdeling = :afdeling, status = :status, deadline = :deadline WHERE id = :id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':titel', $title);
            $stmt->bindParam(':beschrijving', $content);
            $stmt->bindParam(':afdeling', $department);
            $stmt->bindParam(':status', $status);
            $stmt->bindParam(':deadline', $deadline);
            $stmt->bindParam(':id', $_SESSION['task_id']);
            $stmt->execute();
            echo "Task updated successfully!";
            header('Location: '.$base_url.'/takenlijst.php');
            break;
        default:
            $_SESSION['action'] = null;
            $_SESSION['error'] = 'Invalid action';
            break;
    }
}