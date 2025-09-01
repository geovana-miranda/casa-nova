<?php

use \CasaNova\Controller\ItemListController;
use CasaNova\Controller\EditItemController;
use CasaNova\Controller\Error404Controller;
use CasaNova\Controller\NewItemController;
use \CasaNova\Repository\ItemRepository;
use PDO;

require_once __DIR__ . "/../vendor/autoload.php";

$pdo = new PDO("mysql:dbname=casanova;host=localhost", "root", "");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

$itemRepository = new ItemRepository($pdo);

$path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

if (!array_key_exists("PATH_INFO", $_SERVER) || $path === "/") {
    $controller = new ItemListController($itemRepository);
    require_once __DIR__ . "/../pages/home.php";
} elseif ($path === "/login") {
    require_once __DIR__ . "/../pages/login.php";
} elseif ($path === "/register") {
    require_once __DIR__ . "/../pages/register.php";
} elseif ($path === "/details") {
    require_once __DIR__ . "/../pages/details.php";
} elseif ($path === "/newitem") {
    require_once __DIR__ . "/../pages/newitem.php";
    $controller = new NewItemController($itemRepository);
} elseif ($path === "/edit-item") {
    $controller = new EditItemController($itemRepository);
    require_once __DIR__ . "/../pages/edit-item.php";
} else {
    $controller = new Error404Controller();
}

$controller->handleRequest();
