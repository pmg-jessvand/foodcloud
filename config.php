<?php

$BASE_URI = '/eindopdracht/site/';

CONST DB_DSN = 'mysql:dbname=foodcloud;host=127.0.0.1;port=3306';
CONST DB_USER = 'root';
CONST DB_PWD = 'root';

//connectie maken met DB
$db = new PDO(DB_DSN, DB_USER, DB_PWD);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);