<?php

namespace App\Repositories;

use App\DTO\LoginDTO;
use App\DTO\RegisterDTO;
use App\Models\User;
use App\Repositories\Contracts\AuthRepositoryInterface;
use Illuminate\Support\Facades\Hash;

class AuthRepository implements AuthRepositoryInterface
{

    public function register(RegisterDTO $dto) :User
    {
        return User::create([
            'name' => $dto->name,
            'surname' => $dto->surname,
            'password' => Hash::make($dto->password),
            'email' => $dto->email,
            'type' => $dto->type,
        ]);

    }

    public function login(LoginDTO $dto)
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
