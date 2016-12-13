<?php
/**
 * Created by IntelliJ IDEA.
 * User: samuel
 * Date: 13/12/2016
 * Time: 17:16
 */
require("../vendor/autoload.php");

$templates = new League\Plates\Engine(__DIR__.'/views');
echo $templates->render('index');