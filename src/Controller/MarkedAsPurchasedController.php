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
        $user_id = $_SESSION["user_id"];
        $id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);

        $result = $this->itemRepository->markedAsPurchased($id, $user_id);

        if (!$result) {
            $_SESSION["error"] = "Erro ao marcar item como comprado. Tente novamente.";
        } else {
            $_SESSION["success"] = "Item marcado como comprado. Parabéns!";
        }

        header("Location: /details?id=$id");

    }
}