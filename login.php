<?php
session_start();
global $base_url;

require_once './config/config.php';

?>

<!DOCTYPE html>
<html lang="en">
<script src="resources/scripts/switch.js"></script>
<?php require_once "./resources/views/head.php" ?>
<body>
    <?php require_once "./resources/views/header.php"; ?>
    <main>
        <div class="forms">
            <form action="<?php echo $base_url; ?>/app/Http/Controllers/Auth/logincontroller.php" method="post" id="loginform">
                <h1>Login</h1>
                <div class="login">
                    <div class="user_info">
                        <div class="info">
                            <label for="email">E-mail:</label>
                            <input type="email" id="email" name="email" required placeholder="E-mail">
                        </div>
                        <div class="info">
                            <label for="password">Wachtwoord</label>
                            <input type="password" id="password" name="password" required placeholder="Wachtwoord">
                        </div>
                    </div>
                    <button type="submit">Login</button>
                    <p class="medium">Heb je nog geen account? <a href="#" id="toggle">Registreer</a></p>
                </div>
            </form>
            <form action="<?php echo $base_url; ?>/app/Http/Controllers/Auth/registercontroller.php" method="post" style="display: none;" id="registerform">
                <h1>Registreer</h1>
                <div class="login">
                    <div class="user_info">
                        <div class="info">
                            <label for="name">Naam:</label>
                            <input type="text" id="name" name="name" required placeholder="Naam">
                        </div>
                        <div class="info">
                            <label for="email">E-mail:</label>
                            <input type="email" id="email" name="email" required placeholder="Email address">
                        </div>
                        <div class="info">
                            <label for="password">Wachtwoord</label>
                            <input type="password" id="password" name="password" required placeholder="Wachtwoord">
                        </div>
                    </div>
                    <button type="submit">Registreer</button>
                    <p class="medium">Heb je al een account? <a href="?register" id="toggle">Login</a></p>
                </div>
            </form>
        </div>
    </main>
    <?php require_once "./resources/views/footer.php" ?>
</body>
</html>