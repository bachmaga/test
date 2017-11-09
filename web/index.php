<?php

//ini_set('display_errors', 'On');
//error_reporting(E_ALL);

use App\DI\DependencyInjection;
use App\Controller\DefaultController;

$loader = require __DIR__.'/../vendor/autoload.php';
$loader->add('App', __DIR__.'/../src/');

// get di and controller
$di = new DependencyInjection();
$controller = new DefaultController($di);


//simple route
if (!isset($_GET['module']) || !isset($_GET['action'])) {
    $controller->indexAction();
} else {
	$action = $_GET['module'].ucfirst($_GET['action']).'Action';
	$controller->$action();
}