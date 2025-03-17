<?php
global $base_url;

require_once './config/config.php';

?>
<!DOCTYPE html>
<html lang="en">
<?php require_once "./resources/views/head.php" ?>
<body class="full-size flex-container flex-column">
    <?php require_once "./resources/views/header.php"; ?>
    <main>
        <form>
            <label for="username">Gebruikersnaam:</label>
            <input type="text" id="username" name="username" required>
            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" required>
            <label for="password">Wachtwoord</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Login</button>
        </form>
    </main>
    <?php require_once "./resources/views/footer.php" ?>
</body>
</html>