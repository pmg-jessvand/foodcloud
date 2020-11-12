<?php
    
    require('../app.php');

    //set up pagination for recipes
    $page = $_GET['page'] ?? '';
    if(!$page) {
        $page = 1;
    }

    // get all the categories from the database
    $categories = Recipe::getCategories();

    // there is no post show all recipes
    if( isset($_POST['categories'])) {
        $category = $_POST['categories'];
        // if category has a value of all show all recipes else show the right category
        if($category === "all") {
            $recipes = Recipe::getAll();

        } else {
            $recipes = Recipe::getByCategory($category);

        }

    } else {
        $recipes = Recipe::getAll();
    }

?>
<!DOCTYPE html>
<html lang="en">
<?php include('../views/head.php') ?>
<body>
    <div class="page recipes-page">
        <?php include('../views/navbar.php') ?>

        <div class="container page-content-container">
            <div class="row">

                <div class="col-12 col-md-12 col-lg-2 col-xl-2 ">
                    <div class="container filter-container">
                        <div class="recipe-filter">
                            <form method="POST">
                                <select name="categories" id="categories">
                                    <option value="all">alle recepten</option>
                                    <?php
                                        foreach($categories as $cat) {
                                            echo '<option value="' . $cat['cat_name'] . '">'  . $cat['cat_name'] . '</option>';
                                        }
                                    ?>
                                </select>
                                <button type="submit" class="button-long-color">ok</button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-12 col-lg-10 col-xl-10">
                    <div class="container recipe-list">
                        <div class="row">
                            <div class="col-6 col-md-6 col-lg-6 col-xl-6 recipe-list-title">
                                <h1>Recepten</h1>
                            </div>
                            <div class="col-6 col-md-6 col-lg-6 col-xl-6 recipe-list-button">
                                <a href="./pages/add-recipe-page.php"> <i class="fas fa-plus-circle"></i> </a>
                            </div>
                            <?php
                                foreach($recipes as $recipe) {
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