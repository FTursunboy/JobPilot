<?php

namespace App\Repositories;

use App\DTO\LoginDTO;
use App\DTO\RegisterDTO;
use App\DTO\VerifyDTO;
use App\Jobs\SendVirificationEmail;
use App\Models\User;
use App\Repositories\Contracts\AuthRepositoryInterface;
use Illuminate\Auth\Events\Login;
use Illuminate\Queue\Jobs\Job;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthRepository implements AuthRepositoryInterface
{

    public function register(RegisterDTO $dto)
    {
        $code = rand(1000, 9999);
       $user = User::create([
            'name' => $dto->name,
            'code' => $code,
            'surname' => $dto->surname,
            'password' => Hash::make($dto->password),
            'email' => $dto->email,
            'type' => $dto->type,
        ]);




       SendVirificationEmail::dispatch($user->email, $code);

    }

    public function login(LoginDTO $dto)
    {
        $user = User::where('email', $dto->email)->first();

        if (!$user || !Hash::check($dto->password, $user->password)) {
            throw ValidationException::withMessages(['message' => __('auth.failed')]);
        }

        return $user;
    }


    public function forgotPassword(string $email)
    {
        $code = rand(1000, 9999);
        $user = User::where('email', $email)->first();
        $user->code = $code;
        $user->save();
        SendVirificationEmail::dispatch($email, $code);
    }

    public function setPassword(string $password)
    {
        $user = Auth::user();

        $user->password = Hash::make($password);
        $user->save();
    }

    public function verify(VerifyDTO $dto)
    {

        $user = User::where('email', $dto->email)->first();


        if (!$user || $user->code !== $dto->code) {
            throw ValidationException::withMessages(['message' => 'Неверный код подтверждения']);
        }
        $user->code = null;
        $user->save();

        return $user;
    }
}
