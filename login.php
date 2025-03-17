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
        <div class="forms">
            <form>
                <h1>Login</h1>
                <div class="login">
                    <div class="user_info">
                        <div class="info">
                            <label for="email">E-mail:</label>
                            <input type="email" id="email" name="email" required placeholder="Email address">
                        </div>
                        <div class="info">
                            <label for="password">Wachtwoord</label>
                            <input type="password" id="password" name="password" required placeholder="Password">
                        </div>
                    </div>
                    <button type="submit">Login</button>
                </div>
                <p>Heb je nog geen account? <a href="#">Registreer</a></p>
            </form>
        </div>
    </main>
    <?php require_once "./resources/views/footer.php" ?>
</body>
</html>
