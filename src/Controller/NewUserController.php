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

        if ($_POST) {
            $name = filter_input(INPUT_POST, "name");
            $email = filter_input(INPUT_POST, "email");
            $password = filter_input(INPUT_POST, "password");
            $confirmPassword = filter_input(INPUT_POST, "confirm-password");

            if ($confirmPassword !== $password) {
                $_SESSION["error"] = "As senhas são diferentes.";

                $_SESSION['form_data'] = [
                    "name" => $name,
                    "email" => $email,
                    "password" => $password,
                    "confirmPassword" => $confirmPassword
                ];

                header("Location: /register");
                return;
            }

            $hash = password_hash($password, PASSWORD_ARGON2ID);

            $emailExists = $this->userRepository->existsByEmail($email);

            if ($emailExists) {
                $_SESSION["error"] = "Email já cadastrado.";

            } else {
                $result = $this->userRepository->add(new User($name, $email, $hash));
                if ($result) {
                    header("Location: /");
                    return;
                } else {
                    $_SESSION["error"] = "Erro ao cadastrar usuário. Tente novamente.";
                }
            }
            header("Location: /register");

        } else {
            require_once __DIR__ . "/../Views/register.php";
        }
    }
}