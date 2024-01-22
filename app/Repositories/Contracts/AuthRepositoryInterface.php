<?php

namespace App\Repositories\Contracts;

use App\DTO\LoginDTO;
use App\DTO\RegisterDTO;

interface AuthRepositoryInterface
{
    public function register(RegisterDTO $dto);

    public function login(LoginDTO $dto);

    public function forgotPassword(string $email);

    public function setPassword(array $data);


}
