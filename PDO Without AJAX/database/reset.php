<?php
/**
 * Created by IntelliJ IDEA.
 * User: samuel
 * Date: 14/12/2016
 * Time: 10:43
 */
require_once("../functions.php");

$pdo = getDBConnection();

$pdo->exec("DROP TABLE IF EXISTS 'users'");
$pdo->exec("DROP TABLE IF EXISTS 'registrations'");
echo "Tables dropped.<br/>";

require("migrations.php");
require("seeds.php");

echo "Database has been reset<br/>";