<div class="col-12 col-md-6 col-lg-6 col-xl-6">
    <a href="./pages/recipe-detail-page.php?id=<?=$recipe['id']?>" class="recipe-card">
        <div class="row">
            <div class="col-6 col-md-6 col-lg-6 col-xl-6 recipe-card-img">
                <img src="<?= $recipe['imageUrl'] ?>" alt="recipe-thumbnail">
            </div>
            <div class="col-6 col-md-6 col-lg-6 col-xl-6 recipe-card-info">
                <p><?= $recipe['title'] ?></p>
            </div>
        </div>
    </a>
</div>