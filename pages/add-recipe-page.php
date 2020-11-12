
<!DOCTYPE html>
<?php
    require('../app.php');

    $categories = Recipe::getCategories();

    if( isset($_POST['addRecipe']) ) {
        $sql = 'INSERT INTO `recipes` (`title`, `ingredients`, `instructions`, `imageUrl`, `category`) VALUES (:title, :ingredients, :instructions, :imageUrl, :category)';
        $pdo_statement = $db->prepare($sql);
        $pdo_statement->execute([
            ':title' => $_POST['title'],
            ':ingredients' => $_POST['ingredients'],
            ':instructions' => $_POST['instructions'],
            ':imageUrl' => $_POST['imageUrl'],
            ':category' => $_POST['category'],
        ]);
        $newRecipe = $db -> lastInsertId();
    }
?>
<html lang="en">
<?php include('../views/head.php') ?>
<body>
    
    <div class="page add-recipe-page">
        <?php include('../views/navbar.php') ?>

        <div class="container page-content-container">
            <div class="row">

                <div class="col-12 col-md-12 col-lg-3 col-xl-3">
                    <div class="add-recipe-info">
                        <h2>Deel jouw recept met de community!</h2>
                    </div>
                </div>

                <div class="col-12 col-md-12 col-lg-9 col-xl-9">
                    <div class="container form-container">
                        <form method="POST">
                            <div class="form-segment">
                                <input type="text" name="title" id="title" placeholder="Titel...">
                            </div>
                            <div class="form-segment">
                                <label for="ingredients">Ingredienten:</label>
                                <textarea name="ingredients" id="ingredients" placeholder="500g kaas..."></textarea>
                            </div>
                            <div class="form-segment">
                                <label for="instructions">Bereiding:</label>
                                <textarea name="instructions" id="instructions" placeholder="Stap 1..."></textarea>
                            </div>
                            <div class="form-segment">
                                <label for="picture">Receptafbeelding (link)</label>
                                <input type="text" name="imageUrl" id="imageUrl">
                            </div>
                            <div class="form-segment">
                                <label>Categorie:</label>
                                <select name="category" id="category">
                                    <option value=""></option>
                                    <?php
                                        foreach($categories as $category) {
                                            echo '<option value="' . $category['cat_name'] . '">'  . $category['cat_name'] . '</option>';
                                        }
                                    ?>
                                </select>
                            </div>
                            <button class="button-long-color" type="submit" name="addRecipe">Voeg recept toe</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script src="./js/form.js"></script>
</body>
</html>