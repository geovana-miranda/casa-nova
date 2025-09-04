<?php

namespace CasaNova\Controller;

use CasaNova\Models\User;
use CasaNova\Repository\UserRepository;

class NewUserController implements Controller
{
    public function __construct(private UserRepository $userRepository)
    {
    }

    public function handleRequest(): void
    {
        $name = filter_input(INPUT_POST, "name");
        $email = filter_input(INPUT_POST, "email");
        $password = filter_input(INPUT_POST, "password");

        $hash = password_hash($password, PASSWORD_ARGON2ID);

        $this->userRepository->add(new User($name, $email, $hash));
        header("Location: /login");
    }
}