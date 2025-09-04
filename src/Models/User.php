<?php

namespace CasaNova\Models;

class User
{
    public readonly ?int $id;
    public readonly string $name;
    public readonly string $email;
    public readonly string $password;

        public function __construct(
        string $name,
        string $email,
        string $password        
    ) {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;        
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }
}