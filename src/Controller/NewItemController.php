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
        $user_id = $_SESSION["user_id"];
        $name = filter_input(INPUT_POST, "name");
        $link = filter_input(INPUT_POST, "link", FILTER_VALIDATE_URL);
        $category = filter_input(INPUT_POST, "category");
        $value = filter_input(INPUT_POST, var_name: "value");
        $status = filter_input(INPUT_POST, var_name: "status");

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

        $result = $this->itemRepository->add(new Item($name, $link, $category, $value, $user_id, $status, $image));
        
        if (!$result) {
            $_SESSION["error"] = "Erro ao adicionar novo item. Tente novamente.";
        } else {
            $_SESSION["success"] = "Item adicionado com sucesso.";
        }
        
        header("Location: /");
    }
}