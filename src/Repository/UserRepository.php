<?php

namespace CasaNova\Repository;
use CasaNova\Models\User;
use PDO;

class UserRepository
{
     public function __construct(private PDO $pdo)
    {
    }

    public function add(User $user): bool
    {      
        $statement = $this->pdo->prepare("INSERT INTO users (name, email, password) VALUES (:name, :email, :password)");
        $statement->bindValue(":name", $user->name);
        $statement->bindValue(":email", $user->email);
        $statement->bindValue(":password", $user->password);
        
        $result = $statement->execute();

        $id = $this->pdo->lastInsertId();
        $user->setId(intval($id));

        return $result;
    }
}