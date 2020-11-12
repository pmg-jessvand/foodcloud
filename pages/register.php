<?php
    require('../app.php');

    $message = "";

    if( isset($_POST['register'])) {

        $sql = 'SELECT COUNT(`email`) as total from `users` WHERE `email` = :email'; 
        $pdo_statement = $db->prepare($sql);
        $pdo_statement->execute([
            ':email' =>  $_POST['email'] ?? '',
        ]);
        $total = (int) $pdo_statement->fetchColumn();

        if($total > 0) {
            $message = 'email already exists...';
        } else {

            $sql = 'INSERT INTO `users` (`name`, `email`, `password`) VALUES (:name, :email, :password)'; 
            $pdo_statement = $db->prepare($sql);
            $pdo_statement->execute( [
                ':name' => $_POST['name'] ?? '',
                ':email' => $_POST['email'] ?? '',
                ':password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
            ] );
            
            $user_id = $db->lastInsertId();
            
            header('location: ./login.php');
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
                        <h2>Welcome to FoodCloud!</h2>
                        <?php if($message) : ?>
                        <p><strong> <?= $message ?> </strong></p>
                        <?php endif; ?>
                        <form method="POST">
                            <div class="form-input">
                                <label for="name">Username</label>
                                <input type="text" name="name" placeholder="Username">
                            </div>
                            <div class="form-input">
                                <label for="email">E-mail</label>
                                <input type="text" name="email" placeholder="E-mail">
                            </div>
                            <div class="form-input">
                                <label for="password">Password</label>
                                <input type="password" name="password" placeholder="Password">
                            </div>
                            <div class="form-input">
                                <button type="submit" name="register">Register</button>
                            </div>
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