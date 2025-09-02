<?php

namespace CasaNova\Controller;

use \CasaNova\Repository\ItemRepository;

class DetailsItemController implements Controller
{
    public function __construct(private ItemRepository $itemRepository)
    {
    }

    public function handleRequest(): void
    {
        $id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);

        $item =  $this->itemRepository->findById($id);
        require_once __DIR__ . "/../Views/details.php";
    }
}