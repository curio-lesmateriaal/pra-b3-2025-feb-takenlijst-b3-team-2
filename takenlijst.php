<?php
require_once "./app/Http/Controllers/Auth/taskcontroller.php";
global $base_url, $tasks;
$tasks = $_SESSION['tasks'] ?? [];


if(isset($_POST['filter'])){
    $_SESSION['action'] = "filter";
}else if(isset($_POST['reset'])){
    $_SESSION['action'] = "reset";
}
// else{
//     $_SESSION['action'] = "select";
// }
require_once './config/config.php';

if (!isset($_SESSION['is_logged_in'])) {
    $_SESSION['is_logged_in'] = false;
}

if ($_SESSION['is_logged_in'] == false) {
    header('location: ' . $base_url . '/login.php');
    exit;
}
?>

<!doctype html>
<html lang="nl">

<head>
    <title>taken</title>
    <?php require_once "./resources/views/head.php"; ?>
</head>

<body>

    <script>if (!window.location.hash.includes('#user')) {
            window.location.href = window.location.href + '#user';
            window.location.reload();
        }
    </script>

    <?php require_once "./resources/views/header.php"; ?>

    <main class="container">
        <div class="searchbar">
            <form action="./app/Http/Controllers/Auth/taskcontroller.php" method="post">
                <input type="hidden" name="action" value="filter">
                <label for="title">titel:</label>
                <input type="text" placeholder="titel" name="title" id="name">
                <label for="description">beschrijving:</label>
                <input type="text" placeholder="beschrijving" name="description" id="description">
                <label for="department">afdeling:</label>
                <select name="department" id="department">
                    <option disabled selected value="placeholder">Selecteer een optie</option>
                    <option value="Development">Development</option>
                    <option value="Marketing">Marketing</option>
                    <option value="Cybersecurity">Cybersecurity</option>
                    <option value="Finance">Finance</option>
                    <option value="HR">HR</option>
                </select>
                <button name="filter" type = "submit" id="filter">filter</button>
                <button name="reset" type = "submit" id="reset">reset</button>
            </form>
        </div>
        <div class="create-red">
            <a href="./create.php">Create</a>
        </div>
        <div class="flex-container" id="columns">
            <div class="column">
                <h2>To-do</h2>
                <ul class="taken">
                    <?php
                    $todo = array_filter($tasks, fn($task) => $task['status'] == 'to-do');
                    foreach ($todo as $task):
                        ?>
                        <li><?php echo htmlspecialchars($task['titel']) ?>
                            <div class="button-container">
                                <button class="dropdown-button">
                                    <img src="./resources/img/icons/menu.png" alt="Button Image">
                                </button>
                                <div class="dropdown-content">
                                    <a href="edit.php?id=<?php echo urlencode($task['id']) ?>" class="edit">Edit</a>
                                    <a href="remove.php?id=<?php echo urlencode($task['id']) ?>?action=delete"
                                        class="remove">Remove</a>
                                </div>
                            </div>
                            <p class="description"><?php echo htmlspecialchars($task["beschrijving"]) ?></p>
                            <p class="department">Department: <?php echo htmlspecialchars($task["afdeling"]) ?></p>
                            <p class="deadline">Deadline: <?php echo htmlspecialchars($task["deadline"]) ?></p>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="column">
                <h2>Doing</h2>
                <ul class="taken">
                    <?php
                    $doing = array_filter($tasks, fn($task) => $task['status'] == 'doing');
                    foreach ($doing as $task):
                        ?>
                        <li><?php echo htmlspecialchars($task['titel']) ?>
                            <div class="button-container">
                                <button class="dropdown-button">
                                    <img src="./resources/img/icons/menu.png" alt="Button Image">
                                </button>
                                <div class="dropdown-content">
                                    <a href="edit.php?id=<?php echo urlencode($task['id']) ?>" class="edit">Edit</a>
                                    <a href="remove.php?id=<?php echo urlencode($task['id']) ?>?action=delete"
                                        class="remove">Remove</a>
                                </div>
                            </div>
                            <p class="description"><?php echo htmlspecialchars($task["beschrijving"]) ?></p>
                            <p class="department">Department: <?php echo htmlspecialchars($task["afdeling"]) ?></p>
                            <p class="deadline">Deadline: <?php echo htmlspecialchars($task["deadline"]) ?></p>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="column">
                <h2>In-Review</h2>
                <ul class="taken">
                    <?php
                    $review = array_filter($tasks, fn($task) => $task['status'] == 'review');
                    foreach ($review as $task):
                        ?>
                        <li><?php echo htmlspecialchars($task['titel']) ?>
                            <div class="button-container">
                                <button class="dropdown-button">
                                    <img src="./resources/img/icons/menu.png" alt="Button Image">
                                </button>
                                <div class="dropdown-content">
                                    <a href="edit.php?id=<?php echo urlencode($task['id']) ?>" class="edit">Edit</a>
                                    <a href="remove.php?id=<?php echo urlencode($task['id']) ?>?action=delete"
                                        class="remove">Remove</a>
                                </div>
                            </div>
                            <p class="description"><?php echo htmlspecialchars($task["beschrijving"]) ?></p>
                            <p class="department">Department: <?php echo htmlspecialchars($task["afdeling"]) ?></p>
                            <p class="deadline">Deadline: <?php echo htmlspecialchars($task["deadline"]) ?></p>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="column">
                <h2>Done</h2>
                <ul class="taken">
                    <?php
                    $done = array_filter($tasks, fn($task) => $task['status'] == 'done');
                    foreach ($done as $task):
                        ?>
                        <li><?php echo htmlspecialchars($task['titel']) ?>
                            <div class="button-container">
                                <button class="dropdown-button">
                                    <img src="./resources/img/icons/menu.png" alt="Button Image">
                                </button>
                                <div class="dropdown-content">
                                    <a href="edit.php?id=<?php echo urlencode($task['id']) ?>" class="edit">Edit</a>
                                    <a href="remove.php?id=<?php echo urlencode($task['id']) ?>?action=delete"
                                        class="remove">Remove</a>
                                </div>
                            </div>
                            <p class="description"><?php echo htmlspecialchars($task["beschrijving"]) ?></p>
                            <p class="department">Department: <?php echo htmlspecialchars($task["afdeling"]) ?></p>
                            <p class="deadline">Deadline: <?php echo htmlspecialchars($task["deadline"]) ?></p>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </main>
    <?php require_once "./resources/views/footer.php"; ?>
</body>
<script src="resources/scripts/dropdown.js"></script>

</html>