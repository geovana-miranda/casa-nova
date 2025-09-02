<?php

namespace CasaNova\Controller;

use CasaNova\Models\Item;
use \CasaNova\Repository\ItemRepository;

class DeleteItemController implements Controller
{
    public function __construct(private ItemRepository $itemRepository)
    {
    }

    public function handleRequest(): void
    {
        $id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);

        $this->itemRepository->remove($id);
        header("Location: /");
    }
}