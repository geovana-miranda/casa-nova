<?php

namespace CasaNova\Controller;
use \CasaNova\Repository\ItemRepository;

class ItemListController implements Controller
{
    public function __construct(private ItemRepository $itemRepository)
    {
    }

    public function handleRequest(): void
    {
        $user_id = $_SESSION["user_id"];
        $itemsList = $this->itemRepository->findByUserId($user_id);
        
        require_once __DIR__ . "/../Views/item-list.php";
    }
}