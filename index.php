<?php 
session_start();

require_once("vendor/autoload.php");

use Slim\Slim;

$app = new Slim();

$app->config('debug', true);

require_once("views/functions.php");
require_once("views/site.php");
require_once("views/admin.php");
require_once("views/admin-users.php");
require_once("views/admin-categories.php");
require_once("views/admin-products2.php");

$app->run();

 ?>