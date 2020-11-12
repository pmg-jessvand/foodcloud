<?php
    require_once('./app.php');
    
    // if the user is not logged in they will be asked to log in
    if(!$_SESSION) {
        $randomize_link = "./pages/login.php";
    } else {
        $randomize_link = "./pages/randomize-page.php";
    }
?>
<!DOCTYPE html>
<html lang="en">
<?php include('./views/head.php') ?>
<body>
    <div class="page home-page">
        <?php include('./views/navbar.php') ?>

        <div class="container page-content-container">
            <div class="hero-image-container animate__animated animate__fadeInDown">
                <img src="images/foodcloud-logo.svg" alt="fc-logo">
            </div>
            <div class="hero-button-container">
                <a href="<?= $randomize_link ?>" class="button-long"> Give me a recipe! </a>
            </div>

        </div>

    </div>
</body>
</html>