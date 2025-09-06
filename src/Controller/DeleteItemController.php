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

        $result = $this->itemRepository->remove($id, $user_id);
        
        if (!$result) {
            $_SESSION["error"] = "Erro ao excluir novo item. Tente novamente.";
        } else {
            $_SESSION["success"] = "Item excluído com sucesso.";
        }

        header("Location: /");
    }
}