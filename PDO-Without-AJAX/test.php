<?php
/**
 * Created by IntelliJ IDEA.
 * User: samuel
 * Date: 12/12/2016
 * Time: 23:04
 */

require('../vendor/autoload.php');
use Samyoul\U2F\U2FServer\U2FServer as U2F;

var_dump(U2F::checkOpenSSLVersion());