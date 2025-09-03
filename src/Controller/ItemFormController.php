<?php

namespace CasaNova\Controller;

use \CasaNova\Repository\ItemRepository;

class ItemFormController implements Controller
{
    public function __construct(private ItemRepository $itemRepository)
    {
    }

    public function handleRequest(): void
    {
        $id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);
        if ($id) {
            $item = $this->itemRepository->findById($id);
            require_once __DIR__ . "/../Views/new-item.php";
        } else {
            $item = null;
            require_once __DIR__ . "/../Views/new-item.php";
        }
    }
}