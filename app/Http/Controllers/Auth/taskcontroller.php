<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
// $_SESSION['action'] = "";
if (isset($_POST['action'])) {
    $_SESSION['action'] = $_POST['action'];
}
$user_id = $_SESSION['user_id'] ?? null;
global $conn, $base_url;

$action = $_POST['action'] ?? $_SESSION['action'] ?? '';
$_SESSION['action'] = $action;

$_SESSION['error'] = "";

if (!isset($_POST['action']) && !isset($_SESSION['action'])) {
    $_SESSION['action'] = "";
    $_POST['action'] = "";
}
$_SESSION[' error'] = "";

//echo $_SESSION['action'];
//echo "<br>";
//echo $user_id;
//echo "<br>";
//echo isset($_POST['action'])."|".isset($_SESSION['action']);
//echo "<br>";
require_once __DIR__ . '/../../../../config/conn.php';
if (isset($_POST['action']) || isset($_SESSION['action'])) {
    switch ($action) {
        case 'create':
            if (empty($_POST['title']) || empty($_POST['description']) || empty($_POST['department'])) {
                die('Please fill out all fields.');
            }
            $title = $_POST['title'] ?? null;
            $description = $_POST['description'] ?? null;
            $afdeling = $_POST['department'] ?? null;
            $deadline = $_POST['deadline'] ?? null;
            $status = 'to-do';
            $sql = "INSERT INTO taken (titel, beschrijving, afdeling, status, deadline, `user`) VALUES (:title, :description, :afdeling, :status, :deadline, :user_id)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':description', $description);
            $stmt->bindParam(':afdeling', $afdeling);
            $stmt->bindParam(':status', $status);
            $stmt->bindParam(':deadline', $deadline);
            $stmt->bindParam(':user_id', $user_id);
            if ($stmt->execute()) {
                header('location: ' . $base_url . '/takenlijst.php');
                $_SESSION['action'] = "select";
                break;
            } else {
                $_SESSION['error'] = 'Error creating task.';
                header('location: ' . $base_url . '/takenlijst.php');
                $_SESSION['action'] = "select";
                break;
            }

        case 'update':
            echo "update fired ";
            $title = isset($_POST["title"]) ? $_POST["title"] : null;
            $content = isset($_POST["content"]) ? $_POST["content"] : null;
            $department = isset($_POST["department"]) ? $_POST["department"] : null;
            $status = isset($_POST["status"]) ? $_POST["status"] : null;
            $deadline = isset($_POST["date"]) ? $_POST["date"] : null;

            if ($title == null || $content == null || $department == null || $status == null || $deadline == null) {
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
            header('Location: ' . $base_url . '/takenlijst.php#user');
            $_SESSION['action'] = "select";
            break;
        case "delete":
            // Verify task_id exists in session
            $task_id = $_SESSION['task_id'] ?? null;
            if ($task_id === null) {
                $_SESSION['error'] = "Please select a valid task to delete!";
                header('location: ' . $base_url . '/takenlijst.php');
                exit();
            }

            // Ensure user_id is available (you might want to add more validation)
            if (!isset($user_id) || empty($user_id)) {
                $_SESSION['error'] = "User authentication error!";
                header('location: ' . $base_url . '/takenlijst.php#user');
                exit();
            }

            try {
                $sql = "DELETE FROM taken WHERE id = :task_id AND user = :user_id";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
                $stmt->bindParam(':task_id', $task_id, PDO::PARAM_INT);

                if ($stmt->execute()) {
                    $_SESSION['success'] = "Task deleted successfully!";
                } else {
                    $_SESSION['error'] = "Error deleting task.";
                }
            } catch (PDOException $e) {
                $_SESSION['error'] = "Database error: " . $e->getMessage();
            }

            // Clear action and redirect
            $_SESSION['action'] = "";
            header('location: ' . $base_url . '/takenlijst.php#user');
            exit();

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
            $_SESSION['action'] = "select";
            break;
        case 'edit':
            if ($_POST['action'] ?? '' === "update") {
                break;
            }

            $task_id = $_SESSION['task_id'] ?? null;
            if (!$task_id) {
                die("Error: Task ID not set!");
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
            header('location: ' . $base_url . '/takenlijst.php');
            $_SESSION['action'] = "select";
            break;
        case 'filter':
            $user_id = $_SESSION['user_id'] ?? null;
            $department = $_POST['department'] ?? '';
            $title = $_POST['title'] ?? '';
            $description = $_POST['description'] ?? '';

            if (empty($user_id)) {
                die("Error: please log in!");
            }

            $query = "SELECT * FROM taken WHERE user = :user_id";
            $params = [':user_id' => $user_id];

            if (!empty($department)) {
                $query .= " AND afdeling LIKE :department";
                $params[':department'] = "%" . $department . "%";
            }

            if (!empty($title)) {
                $query .= " AND titel LIKE :title";
                $params[':title'] = "%" . $title . "%";
            }

            if (!empty($description)) {
                $query .= " AND beschrijving LIKE :description";
                $params[':description'] = "%" . $description . "%";
            }

            $stmt = $conn->prepare($query);

            // Bind all parameters
            foreach ($params as $key => &$val) {
                $stmt->bindParam($key, $val);
            }

            $stmt->execute();
            $tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $_SESSION['tasks'] = $tasks;
            $_SESSION['action'] = "";
            header('location: ' . $base_url . '/takenlijst.php#user');
            break;
        default:
            $_SESSION['action'] = "select";

    }
}
