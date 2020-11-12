<?php

session_start();

$BASE_PATH = __DIR__;

//Database
require $BASE_PATH . '/config.php';

//load models
require $BASE_PATH .  '/models/Recipe.php';
require $BASE_PATH .  '/models/User.php';
