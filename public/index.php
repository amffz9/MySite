<?php
define('PROJECT_ROOT', '../');
require PROJECT_ROOT . "vendor/autoload.php";
/**
 * Created by PhpStorm.
 * User: adam
 * Date: 11/13/16
 * Time: 12:31 PM
 */

//Initialize project settings
require PROJECT_ROOT . "Routes/routes.php";
//more settings


//Spin up the app

$app = new \App\Application();

$app->run();


