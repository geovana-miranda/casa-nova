<?php

namespace CasaNova\Controller;
use CasaNova\Repository\UserRepository;

class LoginController implements Controller
{
    public function __construct(private UserRepository $userRepository)
    {
    }

    public function handleRequest(): void
    {
        $email = filter_input(INPUT_POST, "email");
        $password = filter_input(INPUT_POST, "password");

        $this->userRepository->login($email, $password);
    }
}