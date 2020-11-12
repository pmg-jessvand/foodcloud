<?php
    require('../app.php');

    $userId = $_SESSION['user_id'];
    $user = User::getById($userId);
    $userRecipes = User::getFavourites($userId);
?>
<!DOCTYPE html>
<html lang="en">
<?php include('../views/head.php') ?>
<body>
    <div class="page account-page">
        <?php include('../views/navbar.php') ?>

        <div class="container page-content-container">
            <div class="row">

                <div class="col-12 col-md-12 col-lg-4 col-xl-4 ">
                    <div class="container details-container">
                        <div class="row">
                            <h2>Accountgegevens</h2>
                            <div class="detail-item col-12">
                                <p><strong> Gebruikersnaam: </strong></p>
                                <p><?= $user->name ?></p>
                            </div>
                            <div class="detail-item col-12">
                                <p><strong> E-mailadres: </strong></p>
                                <p><?= $user->email ?></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-12 col-lg-8 col-xl-8">
                    <div class="container recipe-list">
                        <div class="row">
                            <div class="col-12 recipe-list-title">
                                <h1>Recepten</h1>
                            </div>
                            <?php
                                foreach($userRecipes as $recipe) {
                                    include('../views/recipelistCard.php');
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>
</html>