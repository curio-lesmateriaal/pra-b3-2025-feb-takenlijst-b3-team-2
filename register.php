<?php
global $base_url;

require_once './config/config.php';

?>
<!DOCTYPE html>
<html lang="en">
<?php require_once "./resources/views/head.php" ?>

<body class="">
    <?php require_once "./resources/views/header.php"; ?>
    <main>
        <div class="forms">
            <form action="<?php echo $base_url; ?>/app/Http/Controlers/Auth/registercontroller.php" method="post">
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
                    <button type="submit">register</button>
                </div>
                <p>Heb je nog geen account? <a href="#">Registreer</a></p>
            </form>
        </div>
    </main>
    <?php require_once "./resources/views/footer.php" ?>
</body>

</html>