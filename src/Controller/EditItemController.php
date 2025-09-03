<?php

namespace CasaNova\Controller;

use CasaNova\Models\Item;
use \CasaNova\Repository\ItemRepository;

class EditItemController implements Controller
{
    public function __construct(private ItemRepository $itemRepository)
    {
    }

    public function handleRequest(): void
    {
        $id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);

        if ($id !== false) {
            $name = filter_input(INPUT_POST, "name");
            $link = filter_input(INPUT_POST, "link", FILTER_VALIDATE_URL);
            $category = filter_input(INPUT_POST, "category");
            $value = filter_input(INPUT_POST, var_name: "value");
            // $user_id = filter_input(INPUT_POST, var_name: "user_id");

            $value = str_replace(".", "", $value);
            $value = str_replace(",", ".", $value);
            $value = (float) $value;

            if ($link === false) {
                $link = "";
            }

            if ($_FILES["image"]["error"] === UPLOAD_ERR_OK) {
                move_uploaded_file(
                    $_FILES["image"]["tmp_name"],
                    __DIR__ . "/../../public/img/" . $_FILES["image"]["name"]
                );
                $image = $_FILES["image"]["name"];
                $item = new Item($name, $link, $category, $value, 1, $image);
            } else {
                $item = new Item($name, $link, $category, $value, 1);
            }

            $item->setId($id);

            $this->itemRepository->update($item);
            header("Location: /");
        }
    }
}