<?php
    require('../app.php');
    
    $message = "";
    if( isset($_POST['login'])) {

        $user = User::getByUsername($_POST['name']);

        // check if user exists
        if(isset($user->name)) {
            // check if password is correct
            if(password_verify( $_POST['password'], $user->password)) {
                $_SESSION['user_id'] = $user->user_id;
                header('location: ../index.php');
            } else {
                $message = 'Wrong Email / password';
            }
        } else {
            $message = 'Wrong Email / password';
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<?php include('../views/head.php') ?>
<body>
    <div class="page register-page">
        <?php include('../views/alt-navbar.php') ?>

        <div class="container page-content-container">
            <div class="row">

                <div class="col-12 col-md-12 col-lg-6 col-xl-6 ">
                    <div class="container register-item register-item-form">
                        <h2>Welcome back!</h2>
                        <?php if($message) : ?>
                        <p><strong> <?= $message ?> </strong></p>
                        <?php endif; ?>
                        <form method="POST">
                            <div class="form-input">
                                <label for="name">Username</label>
                                <input type="text" name="name" placeholder="Username">
                            </div>
                            <div class="form-input">
                                <label for="password">Password</label>
                                <input type="password" name="password" placeholder="Password">
                            </div>
                            <div class="form-input">
                                <button type="submit" name="login">Login</button>
                            </div>
                            <a class="register-cta" href="./pages/register.php">Nog geen account? Registreer hier!</a>
                        </form>
                    </div>
                </div>

                <div class="col-12 col-md-12 col-lg-6 col-xl-6">
                    <div class="container register-item register-item-img">
                        <img src="./images/foodcloud-logo.svg" alt="fc-logo">
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>
</html>