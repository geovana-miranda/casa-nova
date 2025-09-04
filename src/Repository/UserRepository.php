<?php

namespace CasaNova\Repository;
use CasaNova\Models\User;
use PDO;

class UserRepository
{
    public function __construct(private PDO $pdo)
    {
    }

    public function add(User $user): void
    {
        $statement = $this->pdo->prepare("INSERT INTO users (name, email, password) VALUES (:name, :email, :password)");
        $statement->bindValue(":name", $user->name);
        $statement->bindValue(":email", $user->email);
        $statement->bindValue(":password", $user->password);

        $statement->execute();

        $id = $this->pdo->lastInsertId();
        $user->setId(intval($id));

        header("Location: /login");

    }

    public function login(string $email, string $password): void
    {
        $statement = $this->pdo->prepare("SELECT * FROM users WHERE email = :email");
        $statement->bindValue("email", $email);
        $statement->execute();

        $userData = $statement->fetch(PDO::FETCH_ASSOC);

        $validatePassword = password_verify($password, $userData["password"] ?? "");

        if ($validatePassword) {
            $_SESSION["logado"] = true;
            header("Location: /");
        } else {
            header("Location: /login");
        }

    }
}