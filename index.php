<?php
/**
 * This is the router, the main entry point of the application.
 * It handles the routing and dispatches requests to the appropriate controller methods.
 */
require "vendor/autoload.php";

use App\Controllers\Controller;

$loader = new \Twig\Loader\FilesystemLoader('templates');
$twig = new \Twig\Environment($loader, [
    'debug' => true
]);

if (isset($_GET['uri'])) {
    $uri = $_GET['uri'];
} else {
    $uri = '/';
}

$controller = new Controller($twig);

switch ($uri) {
    case '/':
        $controller->HomePage();
        break;
    default:
        header("HTTP/1.0 404 Not Found");
        echo '404 Not Found';
        return;
        break;
}