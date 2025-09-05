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
            $user_id = $_SESSION["user_id"];
            $name = filter_input(INPUT_POST, "name");
            $link = filter_input(INPUT_POST, "link", FILTER_VALIDATE_URL);
            $category = filter_input(INPUT_POST, "category");
            $value = filter_input(INPUT_POST, var_name: "value");
            $status = filter_input(INPUT_POST, var_name: "status");
            $image = filter_input(INPUT_POST, "current_image");

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
            }

            $item = new Item($name, $link, $category, $value, $user_id, $status, $image);
            $item->setId($id);
            $this->itemRepository->update($item);
        }
    }
}