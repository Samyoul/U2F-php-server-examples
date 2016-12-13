<?php
/**
 * Created by IntelliJ IDEA.
 * User: samuel
 * Date: 13/12/2016
 * Time: 23:51
 */
require("functions.php");

session_start();
unset($_SESSION['authenticatedUser']);

redirect("index.php");