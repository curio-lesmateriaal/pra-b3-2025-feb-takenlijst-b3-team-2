<header>
    <nav class="bold">
        <img src="<?php echo $base_url; ?>/resources/img/icons/favicon.ico?" alt="icon">
        <a href="<?php echo $base_url; ?>/index.php">Home</a>
        <a href="<?php echo $base_url; ?>/takenlijst.php">Takenlijst</a>
        <a href="<?php echo $base_url; ?>/login.php" style="display:<?php echo $b = $_SESSION['is_logged_in']? "none": "inline"?>">Login</a>
        <form class = "logout-form" action="<?php echo $base_url;?>/app/Http/Controllers/Auth/logoutcontroller.php">
            <button class = "logout-button bold" style="display:<?php echo $b = $_SESSION['is_logged_in']? "inline": "none"?>" type="submit" class="logout">Logout</button>
        </form>
    </nav>
</header>