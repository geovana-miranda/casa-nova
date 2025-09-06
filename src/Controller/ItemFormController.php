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
        $user_id = $_SESSION["user_id"];
        $id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);

        if ($id) {
            $item = $this->itemRepository->findById($id, $user_id);
            
            if ($item) {
                require_once __DIR__ . "/../Views/form-item.php";
            } else {
                header("Location: /");
            }
        } else {
            $item = null;
           require_once __DIR__ . "/../Views/form-item.php";
        }
    }
}