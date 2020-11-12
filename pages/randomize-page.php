<?php
    
    require('../app.php');

    $randomRecipe = Recipe::getRandomRecipe();
    
?>
<!DOCTYPE html>
<html lang="en">
<?php include('../views/head.php') ?>
<body>
    <div class="page randomize-page">
        <?php include('../views/navbar.php') ?>

        <div class="container page-content-container">
            <div class="hero-image-container">
                <img src=" <?= $randomRecipe->imageUrl ?> " alt="fc-logo">
                <h2> <?= $randomRecipe->title ?> </h2>
            </div>
            <div class="hero-button-container">
                <a href="./index.php" class="button-long"> <i class="fas fa-times"></i> </a>
                <a href="./pages/randomize-page.php" class="button-long"> next </a>
                <a href="./pages/recipe-detail-page.php?id=<?= $randomRecipe->id ?>" class="button-long"> <i class="fas fa-check"></i> </a>
            </div>

        </div>

    </div>
</body>
</html>