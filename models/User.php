<?php

class User {

    static function getByUsername(string $name) {
        global $db;

        $sql = 'SELECT * FROM `users` WHERE `name` = :name';
        $pdo_statement = $db->prepare($sql);
        $pdo_statement->execute( [':name' => $name] );

        return $pdo_statement->fetchObject();
        
    }

    static function getById(int $id) {
        global $db;

        $sql = 'SELECT * FROM `users` WHERE `user_id` = :id';
        $pdo_statement = $db->prepare($sql);
        $pdo_statement->execute( [':id' => $id] );

        return $pdo_statement->fetchObject();
        
    }

    static function getFavourites(int $user_id) {
        global $db;

        $sql = 'SELECT * FROM `favourites` INNER JOIN `recipes` ON `favourites`.`recipe_id` = `recipes`.`id` WHERE `favourites`.`user_id` = :user_id';
        $pdo_statement = $db->prepare($sql);
        $pdo_statement->execute( [':user_id' => $user_id] );

        return $pdo_statement->fetchAll();
    }

}