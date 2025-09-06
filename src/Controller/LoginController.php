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
        if ($_POST) {
            $email = filter_input(INPUT_POST, "email");
            $password = filter_input(INPUT_POST, "password");

            $userData = $this->userRepository->login($email, $password);

            if ($userData) {
                $_SESSION["logado"] = true;
                $_SESSION["user_id"] = $userData;
                header("Location: /");
            } else {
                $_SESSION["error"] = "Email e/ou senha incorretos.";
                $_SESSION['form_data'] = [
                    "email" => $email,
                    "password" => $password,
                ];

                header("Location: /login");
            }
        } else {
            require_once __DIR__ . "/../Views/login.php";
        }
    }
}