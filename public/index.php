<?php

use CasaNova\Controller\LoginController;
use CasaNova\Controller\LogoutController;
use CasaNova\Controller\MarkedAsPurchasedController;
use CasaNova\Controller\DeleteItemController;
use CasaNova\Controller\DetailsItemController;
use CasaNova\Controller\ItemFormController;
use \CasaNova\Controller\ItemListController;
use CasaNova\Controller\EditItemController;
use CasaNova\Controller\Error404Controller;
use CasaNova\Controller\NewItemController;
use CasaNova\Controller\NewUserController;
use \CasaNova\Repository\ItemRepository;
use CasaNova\Repository\UserRepository;
use PDO;

require_once __DIR__ . "/../vendor/autoload.php";

$pdo = new PDO("mysql:dbname=casanova;host=localhost", "root", "");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

$itemRepository = new ItemRepository($pdo);
$userRepository = new UserRepository($pdo);

$path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

session_start();
if (!array_key_exists("logado", $_SESSION) && $path !== "/login" && $path !== "/register") {
    header("Location: /login");
    return;
}

if (!array_key_exists("PATH_INFO", $_SERVER) || $path === "/") {
    $controller = new ItemListController($itemRepository);
} elseif ($path === "/login") {
    if ($_SERVER["REQUEST_METHOD"] === "GET") {
        require_once __DIR__ . "/../src/Views/login.php";
        return;
    } elseif ($_SERVER["REQUEST_METHOD"] === "POST") {
        $controller = new LoginController($userRepository);
    }
} elseif ($path === "/register") {
    if ($_SERVER["REQUEST_METHOD"] === "GET") {
        require_once __DIR__ . "/../src/Views/register.php";
        return;
    } elseif ($_SERVER["REQUEST_METHOD"] === "POST") {
        $controller = new NewUserController($userRepository);
    }
} elseif ($path === "/logout") {
    $controller = new LogoutController($userRepository);
} elseif ($path === "/details") {
    $controller = new DetailsItemController($itemRepository);
} elseif ($path === "/newitem") {
    if ($_SERVER["REQUEST_METHOD"] === "GET") {
        $controller = new ItemFormController($itemRepository);
    } elseif ($_SERVER["REQUEST_METHOD"] === "POST") {
        $controller = new NewItemController($itemRepository);
    }
} elseif ($path === "/edit-item") {
    if ($_SERVER["REQUEST_METHOD"] === "GET") {
        $controller = new ItemFormController($itemRepository);
    } elseif ($_SERVER["REQUEST_METHOD"] === "POST") {
        $controller = new EditItemController($itemRepository);
    }
} elseif ($path === "/delete-item") {
    $controller = new DeleteItemController($itemRepository);
} elseif ($path === "/marked-as-purchased") {
    $controller = new MarkedAsPurchasedController($itemRepository);
} else {
    $controller = new Error404Controller();
}
$controller->handleRequest();
