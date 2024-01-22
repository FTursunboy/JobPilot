<?php

namespace App\Repositories;

use App\DTO\LoginDTO;
use App\DTO\RegisterDTO;
use App\Models\User;
use App\Repositories\Contracts\AuthRepositoryInterface;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

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
        $user = User::where('email', $dto->email)->first();

        if (!$user || Hash::check($user->password, $dto->password)) {

            throw ValidationException::withMessages(['message' => __('auth.failed')]);
        }



        return $user;

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
