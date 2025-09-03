<?php

namespace CasaNova\Controller;

use CasaNova\Models\Item;
use \CasaNova\Repository\ItemRepository;

class NewItemController implements Controller
{
    public function __construct(private ItemRepository $itemRepository)
    {
    }

    public function handleRequest(): void
    {
        $name = filter_input(INPUT_POST, "name");
        $link = filter_input(INPUT_POST, "link", FILTER_VALIDATE_URL);
        $category = filter_input(INPUT_POST, "category");
        $value = filter_input(INPUT_POST, var_name: "value");
        $user_id = filter_input(INPUT_POST, var_name: "user_id");

        if ($link === false) {
            $link = "";
        }

        if ($_FILES["image"]["error"] === UPLOAD_ERR_OK) {
            move_uploaded_file(
                $_FILES["image"]["tmp_name"],
                __DIR__ . "/../../public/img/" . $_FILES["image"]["name"]
            );
            $image = $_FILES["image"]["name"];
        }

        $this->itemRepository->add(new Item($name, $link, $category, $value, 1, $image));
        header("Location: /");
    }
}