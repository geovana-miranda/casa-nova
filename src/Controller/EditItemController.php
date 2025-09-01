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
            $user_id = filter_input(INPUT_POST, var_name: "user_id");


            if ($link === false) {
                $link = "";
            }

            $this->itemRepository->update(new Item($name, $link, $category, $value, $user_id));

        }
    }
}