<?php

namespace CasaNova\Controller;
use \CasaNova\Repository\ItemRepository;

class DeleteItemController implements Controller
{
    public function __construct(private ItemRepository $itemRepository)
    {
    }

    public function handleRequest(): void
    {
        $user_id = $_SESSION["user_id"];
        $id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);

        $this->itemRepository->remove($id, $user_id);
        header("Location: /");
    }
}