<?php
require '../vendor/autoload.php';
require "../config/autoload.php";

use App\Router;

header('Access-Control-Allow-Origin: *');

$path = $_GET['path'];
$method = $_SERVER['REQUEST_METHOD'];

Router::handlePath($path, $method);
