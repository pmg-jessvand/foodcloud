<?php

    require('../app.php');

    // defining consts
    $recipe_id = $_GET['id'];
    $favouriteLink = './pages/login.php';
    $buttonClass = 'button-round';
    $message = '';

    // get the details of a specific recipe
    $current_recipe = Recipe::getById($recipe_id);

    // if user is not logged in favourite button will direct user to login page
    if($_SESSION) {
        $favouriteLink = './pages/account.php';
        $user_id = $_SESSION['user_id'];
        // check if user already has recipe as favourite
        $fav = Recipe::getIsFavourite($recipe_id, $user_id);
        // recipe is in user favourites change icon
        if($fav > 0) {
            $buttonClass = 'button-round-reverse';
        }
        // add or delete recipe form favourites
        if(isset($_POST['favourite'])) {
            if($fav > 0) {
                $buttonClass = 'button-round';
                
                $sql = 'DELETE FROM `favourites` WHERE `recipe_id` = :recipe_id AND `user_id` = :user_id';
                $pdo_statement = $db -> prepare($sql);
                $pdo_statement->execute( [
                    ':recipe_id' => $recipe_id,
                    ':user_id' => $user_id,
                ]);

            } else {
                $buttonClass = 'button-round-reverse';

                $sql = 'INSERT INTO `favourites` (`recipe_id`, `user_id`) VALUES (:recipe_id, :user_id)';
                $pdo_statement = $db -> prepare($sql);
                $pdo_statement->execute( [
                    ':recipe_id' => $recipe_id,
                    ':user_id' => $user_id,
                ] );
            }
        }
        
    }



?>
<!DOCTYPE html>
<html lang="en">
<?php include('../views/head.php') ?>
<body>
    <div class="page recipe-detail-page">
        <?php include('../views/navbar.php') ?>

        <div class="recipe-banner">
            <img src="<?= $current_recipe->imageUrl ?>" alt="recipe-banner-img">
        </div>

        <div class="container page-content-container recipe-detail-container">
            <h1><?= $current_recipe->title ?></h1>
            <h2>Ingrediënten:</h2>

            <div class="ingredients">
                <div class="ingredients-col">
                    <?= $current_recipe->ingredients ?>
                </div>
            </div>

            <form method="POST" class="recipe-detail-favourite-btn-container">
                <p><?= $message ?></p>
                <button class="<?= $buttonClass ?>" type="submit" name="favourite" href="<?= $favouriteLink ?>"><i class="fas fa-heart"></i></button>
            </form>

            <div class="recipe-detail-instructions">
                <h2>Bereiding:</h2>
                <?= $current_recipe->instructions ?>
                <h2>Smakelijk!</h2>
            </div>

            <div class="back-btn">
                <a class="button-long-color" href="./pages/recipes-page.php">
                    <i class="fas fa-long-arrow-alt-left"></i>
                </a>
            </div>

        </div>

    </div>
</body>
</html>