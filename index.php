<?php

$path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

if (!array_key_exists("PATH_INFO", $_SERVER) || $path === "/") {
    require_once "./pages/home.php";
} elseif ($path === "/login") {
    require_once "./pages/login.php";
} elseif ($path === "/register") {
    require_once "./pages/register.php";
} elseif ($path === "/details") {
    require_once "./pages/details.php";
} elseif ($path === "/newitem") {
    require_once "./pages/newitem.php";
} elseif ($path === "/edit-item") {
    require_once "./pages/edit-item.php";
} else {
    require_once "./pages/home.php";
}
