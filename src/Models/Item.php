<?php

namespace CasaNova\Models;

class Item
{
    public readonly ?int $id;
    public readonly string $name;
    public readonly ?string $image;
    public readonly string $link;
    public readonly string $category;
    public readonly float $value;
    public readonly string $status;
    public readonly int $user_id;

    public function __construct(
        string $name,
        string $link,
        string $category,
        float $value,
        int $user_id,
        ?string $image = null,
        string $status = "pendente"
    ) {
        $this->name = $name;
        $this->link = $link;
        $this->category = $category;
        $this->value = $value;
        $this->user_id = $user_id;
        $this->image = $image;
        $this->status = $status ?? "pendente";
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }
}