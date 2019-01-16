<?php
require 'Application/Bootstrap.php';

session_start();

$controller = new Application\Controllers\Frontend();

if (!isset($_GET['action'])) {$action = "accueil";} else { $action = $_GET['action'];}

if (is_callable(array($controller, $action))) {
    $controller->$action();
} else {
    $controller->index(); //or some kind of error message
}
