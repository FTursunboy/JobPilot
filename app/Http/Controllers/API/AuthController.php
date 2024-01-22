<?php

namespace App\Http\Controllers\API;

use App\DTO\LoginDTO;
use App\DTO\RegisterDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\ForgotPassword;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\SetPasswordRequest;
use App\Http\Resources\UserResource;
use App\Repositories\Contracts\AuthRepositoryInterface;
use App\Traits\ApiResponse;
use Dotenv\Repository\RepositoryInterface;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{
    use ApiResponse;
    private AuthRepositoryInterface $repository;


    public function __construct(AuthRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }


    public function register(RegisterRequest $request) :JsonResponse
    {
        $user = $this->repository->register(RegisterDTO::fromRequest($request));

        return response()->json([
            'user' => UserResource::make($user),
            'token' => $user->createToken('Api Token')->plainTextToken
        ]);
    }

    public function login(LoginRequest $request) :JsonResponse
    {
        $user = $this->repository->login(LoginDTO::fromRequest($request));

        return response()->json([
            'user' => UserResource::make($user),
            'token' => $user->createToken('Api Token')->plainTextToken
        ]);
    }

    public function forgotPassword(ForgotPassword $request) :JsonResponse
    {
        return $this->success($this->success($this->repository->forgotPassword($request->email)));
    }

    public function setPassword(SetPasswordRequest $request)
    {
        return $this->success($this->success($this->repository->forgotPassword($request->password)));
    }

}
