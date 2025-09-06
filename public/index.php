<?php

use CasaNova\Controller\Error404Controller;
use \CasaNova\Repository\ItemRepository;
use CasaNova\Repository\UserRepository;
use PDO;

require_once __DIR__ . "/../vendor/autoload.php";
$routes = require_once __DIR__ . "/../config/routes.php";

$pdo = new PDO("mysql:dbname=casanova;host=localhost", "root", "");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

$path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH) ?? "/";
$method = $_SERVER["REQUEST_METHOD"];
$key = "$method|$path";
$controllerClass = $routes[$key];

if (array_key_exists($key, $routes)) {
    if ($path === "/login" || $path === "/register" || $path === "/logout") {
        $userRepository = new UserRepository($pdo);
        $controller = new $controllerClass($userRepository);
    } else {
        $itemRepository = new ItemRepository($pdo);
        $controller = new $controllerClass($itemRepository);
    }
} else {
    $controller = new Error404Controller();
}

session_start();
if (!array_key_exists("logado", $_SESSION) && $path !== "/login" && $path !== "/register") {
    header("Location: /login");
    return;
}

$controller->handleRequest();
