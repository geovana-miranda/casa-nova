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
        $itemsList = $this->itemRepository->all();
    }
}