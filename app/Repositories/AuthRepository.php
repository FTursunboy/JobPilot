<?php

namespace App\Repositories;

use App\DTO\RegisterDTO;
use App\Repositories\Contracts\AuthRepositoryInterface;

class AuthRepository implements AuthRepositoryInterface
{

    public function register(RegisterDTO $dto)
    {
        // TODO: Implement register() method.
    }

    public function login(array $data)
    {
        // TODO: Implement login() method.
    }

    public function forgotPassword(string $email)
    {
        // TODO: Implement forgotPassword() method.
    }

    public function setPassword(array $data)
    {
        // TODO: Implement setPassword() method.
    }
}
