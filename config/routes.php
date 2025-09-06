<?php

use CasaNova\Controller\DeleteItemController;
use CasaNova\Controller\DetailsItemController;
use CasaNova\Controller\EditItemController;
use CasaNova\Controller\ItemFormController;
use CasaNova\Controller\ItemListController;
use CasaNova\Controller\LoginController;
use CasaNova\Controller\LogoutController;
use CasaNova\Controller\MarkedAsPurchasedController;
use CasaNova\Controller\NewItemController;
use CasaNova\Controller\NewUserController;

return [
    "GET|/" => ItemListController::class,
    "GET|/login" => LoginController::class,
    "POST|/login" => LoginController::class,
    "GET|/register" => NewUserController::class,
    "POST|/register" => NewUserController::class,
    "GET|/logout" => LogoutController::class,
    "GET|/details" => DetailsItemController::class,
    "GET|/newitem" => ItemFormController::class,
    "POST|/newitem" => NewItemController::class,
    "GET|/edit-item" => ItemFormController::class,
    "POST|/edit-item" => EditItemController::class,
    "GET|/delete-item" => DeleteItemController::class,
    "GET|/marked-as-purchased" => MarkedAsPurchasedController::class
];