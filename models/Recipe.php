<?php

class Recipe {

    static function getAll($columns = '*') {
        global $db;
        global $page_size;
        global $offset;

        $sql = 'SELECT ' . $columns . ' FROM `recipes` ORDER BY `title`';

        $pdo_statement = $db -> prepare($sql);
        // $pdo_statement->bindParam(':offset', $offset, PDO::PARAM_INT);
        // $pdo_statement->bindParam(':page_size', $page_size, PDO::PARAM_INT);
        $pdo_statement -> execute();
        return $pdo_statement -> fetchAll();

        
    }


    static function getById($recipe_id) {
        global $db;

        $sql = 'SELECT * FROM `recipes` WHERE `id` = :id';
        $pdo_statement = $db -> prepare($sql);
        $pdo_statement -> execute(
            [
                ':id' => $recipe_id
            ]
        );
        return $pdo_statement -> fetchObject();


    }

    static function getRandomRecipe() {
        global $db;

        $sql = 'SELECT * FROM `recipes` ORDER BY RAND() LIMIT 1';
        $pdo_statement = $db -> prepare($sql);
        $pdo_statement -> execute();
        return $pdo_statement -> fetchObject();
    }

    static function getByCategory($category) {
        global $db;

        $sql = 'SELECT * FROM `recipes` WHERE `category` = :category';
        $pdo_statement = $db -> prepare($sql);
        $pdo_statement -> execute([
            ':category' => $category
        ]);
        return $pdo_statement -> fetchAll();
    }

    static function getCategories() {
        global $db;
        $sql = 'SELECT `cat_name` FROM `categories`';
        $pdo_statement = $db -> prepare($sql);
        $pdo_statement -> execute();
        return $pdo_statement -> fetchAll();

    }

    static function getIsFavourite($recipe_id, $user_id) {
        global $db;

        $sql = 'SELECT COUNT(`recipe_id`) as total from `favourites` WHERE `recipe_id` = :recipe_id AND `user_id` = :user_id';
        $pdo_statement = $db -> prepare($sql);
        $pdo_statement -> execute([
            ':recipe_id' => $recipe_id,
            ':user_id' => $user_id
        ]);
        return $pdo_statement -> fetchColumn();
    }

}