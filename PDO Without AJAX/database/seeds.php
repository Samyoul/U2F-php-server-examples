<?php
/**
 * Created by IntelliJ IDEA.
 * User: samuel
 * Date: 13/12/2016
 * Time: 16:57
 */
require("../functions.php");

$pdo = getDBConnection();

// Insert User seeds
$pdo->exec("
    INSERT INTO `users` VALUES (1,'samyoul');
    INSERT INTO `users` VALUES (2,'donkey');
    INSERT INTO `users` VALUES (3,'shrek');
");

echo "Your database is seeded.";