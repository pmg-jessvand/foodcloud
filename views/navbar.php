<?php 

    if($_SESSION) {
        // if user is logged in show info in navbar
        $user = User::getById($_SESSION['user_id']);

        $account_name = $user->name;
        $account_link = "./pages/account.php";
        $logout_link = "./pages/logoff.php";
        
    } else {
        // else show placeholder
        $account_name = "Registreer / Login";
        $account_link = "./pages/login.php";
        $logout_link = "";
    }

?>

<div class="nav-bar">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-4 col-xl-4">
                        <div class="nav-item nav-item-logo">
                            <a href="#">
                                <img src="images/foodcloud-logo-txt.svg" alt="foodcloud-logo-txt">
                            </a>
                        </div>
                    </div>
                    <div class="col-6 col-md-6 col-lg-4 col-xl-4 hide-sm">
                        <div class="nav-item nav-item-links">
                            <ul>
                                <li><a href="index.php">Home</a></li>
                                <li><a href="./pages/recipes-page.php">Recepten</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-6 col-md-6 col-lg-4 col-xl-4 hide-sm">
                        <div class="nav-item nav-item-account">
                            <a href="<?= $account_link ?>" class="account-button">
                                <p><?= $account_name ?></p>
                                <img src="images/account.svg" alt="account-button"></g>
                                <?php if($logout_link) : ?>
                                <a class="logoff" href="<?= $logout_link ?>">Logout</a>
                                <?php endif; ?>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>