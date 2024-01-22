<?php

namespace App\Repositories\Contracts;

use App\DTO\LoginDTO;
use App\DTO\RegisterDTO;
use App\DTO\VerifyDTO;

interface AuthRepositoryInterface
{
    public function register(RegisterDTO $dto);

    public function verify(VerifyDTO $dto);

    public function login(LoginDTO $dto);

    public function forgotPassword(string $email);

    public function setPassword(array $data);


}
