<?php

namespace CasaNova\Controller;
use CasaNova\Repository\UserRepository;

class LogoutController implements Controller
{
    public function __construct(private UserRepository $userRepository)
    {
    }

    public function handleRequest(): void
    {
        session_destroy();
        header("Location: /login");
    }
}