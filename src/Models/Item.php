<?php

namespace CasaNova\Models;

class Item
{
    public readonly ?int $id;
    public readonly string $name;
    public readonly string $image;
    public readonly string $link;
    public readonly string $category;
    public readonly float $value;
    public readonly string $status;
    public readonly int $user_id;

    public function __construct(
       int $id, string $name, string $image, string $link, string $category, float $value, string $status = "pendente", int $user_id 
    )
    {
        $this->name = $name;
        $this->id = $id;
        $this->image = $image;
        $this->link = $link;
        $this->category = $category;
        $this->value = $value;
        $this->status = $status;
        $this->user_id = $user_id;
    }
}