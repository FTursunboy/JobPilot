<?php

namespace App\Http\Controllers\API;

use App\DTO\LoginDTO;
use App\DTO\RegisterDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Repositories\Contracts\AuthRepositoryInterface;
use App\Traits\ApiResponse;
use Dotenv\Repository\RepositoryInterface;

class AuthController extends Controller
{
    use ApiResponse;
    private AuthRepositoryInterface $repository;

    public function __construct(AuthRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }


    public function register(RegisterRequest $request)
    {
        $this->repository->register(RegisterDTO::fromRequest($request));
    }

    public function login(LoginRequest $request)
    {
        return $this->success($this->repository->login(LoginDTO::fromRequest($request)));
    }
}
