<?php

namespace CasaNova\Controller;
use \CasaNova\Repository\ItemRepository;

class MarkedAsPurchasedController implements Controller
{
    public function __construct(private ItemRepository $itemRepository)
    {
    }

    public function handleRequest(): void
    {
        $id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);

        $this->itemRepository->markedAsPurchased($id);
    }
}