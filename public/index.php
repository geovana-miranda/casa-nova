<?php

require_once __DIR__ . "/../vendor/autoload.php";

$path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

if (!array_key_exists("PATH_INFO", $_SERVER) || $path === "/") {
    require_once __DIR__ . "/../pages/home.php";
} elseif ($path === "/login") {
    require_once __DIR__ . "/../pages/login.php";
} elseif ($path === "/register") {
    require_once __DIR__ . "/../pages/register.php";
} elseif ($path === "/details") {
    require_once __DIR__ . "/../pages/details.php";
} elseif ($path === "/newitem") {
    require_once __DIR__ . "/../pages/newitem.php";
} elseif ($path === "/edit-item") {
    require_once __DIR__ . "/../pages/edit-item.php";
} else {
    http_response_code(404);
}
